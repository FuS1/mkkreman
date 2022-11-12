<?php

namespace Tests\Unit\Http\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Insurance;

class InsuranceControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->initBaseData();

        $this->initFakeUser();
        
    }

    public function testCreateInsurance()
    {
        $testData = [
            'customer_id'       => 'A121894888',
            'car_plate_number'  => 'ABC-965',
            'insurance_category'=> ['任意險','強制險'],
            'source_type'       => '01',
            'company_type'      => '23',
            'sale_id'           => 'NAW7RPN1',
            'introducer'        => '介紹人名',
            'insurance_company' => 'UANBQ8',
            'insurance_user'    => [], 
            'endorsementItem'   => [
                ['insurance_item_id'=>1 ,'item_person_price'=>'10%','item_price_1'=>5830000,'item_price_2'=>0        ,'item_fee'=>185141],
                ['insurance_item_id'=>11,'item_person_price'=>'無' ,'item_price_1'=>2000000,'item_price_2'=>0        ,'item_fee'=>13152 ],
                ['insurance_item_id'=>13,'item_person_price'=>'無' ,'item_price_1'=>3000   ,'item_price_2'=>30       ,'item_fee'=>19929 ],
                ['insurance_item_id'=>14,'item_person_price'=>'10%','item_price_1'=>3006000,'item_price_2'=>0        ,'item_fee'=>8072  ],
                ['insurance_item_id'=>19,'item_person_price'=>'無' ,'item_price_1'=>8000000,'item_price_2'=>16000000 ,'item_fee'=>3066  ],
                ['insurance_item_id'=>28,'item_person_price'=>'無' ,'item_price_1'=>200000 ,'item_price_2'=>2000000  ,'item_fee'=>2230  ]
            ]
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->fakeUser->token->plainTextToken
        ])->post('/api/insurance', $testData);
        
        $insurances = Insurance::with(['endorsement.commission'])
            ->whereHas('customer_car',function($query) use ($testData){
                $query->where('car_plate_number',$testData['car_plate_number'])
                    ->whereHas('customer',function($query) use ($testData){
                        $query->where('customer_id',$testData['customer_id']);
                    });
            })
            ->where('insured_id',$testData['customer_id'])->get();

        // 確認是否成功建立兩張保單
        $this->assertEquals($insurances->count(), 2 ,'保單未成功被建立');

        // 確認兩張保單是否成功建立各自的原始批單與批單對應的佣金
        $insurances->each(function($insurance){
            $this->assertEquals($insurance->endorsement->count(), 1 ,'原始批單未成功被建立');
            
            $this->assertNotNull($insurance->endorsement->first()->commission, '原始批單未成功被建立');

            if($insurance->insurance_category=='強制險'){
                $this->assertEquals($insurance->endorsement->first()->total_premium         , 2230   ,'批單總保費不正確');
                $this->assertEquals($insurance->endorsement->first()->vol_premium           , 0      ,'批單任意險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->tf_premium            , 0      ,'批單颱洪險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->cps_premium           , 2230   ,'批單強制險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->car_premium           , 0      ,'批單車體險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->theft_premium         , 0      ,'批單竊盜險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->third_person_premium  , 0      ,'批單第三人保費不正確');

                $this->assertEquals($insurance->endorsement->first()->commission->company_total_ar,         300 ,'佣金-保險公司總應收佣金不正確');
                $this->assertEquals($insurance->endorsement->first()->commission->source_company_total_ar,  100 ,'佣金-通路總應發佣金不正確');
                $this->assertEquals($insurance->endorsement->first()->commission->sale_total_ar,            200 ,'佣金-業代總應發佣金不正確');
                
            }else{
                $this->assertEquals($insurance->endorsement->first()->total_premium         , 229360 ,'批單總保費不正確');
                $this->assertEquals($insurance->endorsement->first()->vol_premium           , 216208 ,'批單任意險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->tf_premium            , 13152  ,'批單颱洪險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->cps_premium           , 0      ,'批單強制險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->car_premium           , 205070 ,'批單車體險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->theft_premium         , 8072   ,'批單竊盜險保費不正確');
                $this->assertEquals($insurance->endorsement->first()->third_person_premium  , 3066   ,'批單第三人保費不正確');
                
                $this->assertEquals($insurance->endorsement->first()->commission->company_total_ar,         41413 ,'佣金-保險公司總應收佣金不正確');
                $this->assertEquals($insurance->endorsement->first()->commission->source_company_total_ar,  15530 ,'佣金-通路總應發佣金不正確');
                $this->assertEquals($insurance->endorsement->first()->commission->sale_total_ar,            33483 ,'佣金-業代總應發佣金不正確');
                
            }

        });
    }


}