<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'store';

    /**
     * Run the migrations.
     * @table web_user
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tableName)) {
            Schema::create($this->tableName, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title')->nullable()->comment('店名');
                $table->string('file_path',2048)->nullable()->comment('檔案儲存位置');
                $table->string('city')->nullable()->comment('縣市');
                $table->string('address',2048)->nullable()->comment('地址');
                $table->string('status')->nullable()->comment('門市狀態');
                $table->string('phone')->nullable()->comment('門市電話');
                $table->string('job_url',1024)->nullable()->comment('職缺資訊網址');
                $table->tinyInteger('job_ma')->default(0)->nullable()->comment('職缺-主管');
                $table->tinyInteger('job_full_time')->default(0)->nullable()->comment('職缺-正職');
                $table->tinyInteger('job_part_time')->default(0)->nullable()->comment('職缺-計時');
                $table->tinyInteger('pay_cash')->default(0)->nullable()->comment('接受現金付款');
                $table->tinyInteger('pay_credit_card')->default(0)->nullable()->comment('接受信用卡');
                $table->tinyInteger('pay_line_pay')->default(0)->nullable()->comment('接受LINE PAY');
                $table->tinyInteger('can_to_go')->default(0)->nullable()->comment('接受自取');
                $table->tinyInteger('can_delivery')->default(0)->nullable()->comment('接受外送');
                $table->string('maifood_url',2048)->nullable()->comment('大麥訂餐網址');
                $table->string('uber_eat_url',2048)->nullable()->comment('uber_eat訂餐網址');
                $table->string('food_panda_url',2048)->nullable()->comment('food_panda訂餐網址');
                $table->integer('sort_idx')->default(99)->comment('排序(越小越前)');
                $table->nullableTimestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
