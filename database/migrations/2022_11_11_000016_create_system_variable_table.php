<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\SystemVariable;

class CreateSystemVariableTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'system_variable';

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
                $table->string('field')->comment('變數');
                $table->mediumText('value')->nullable()->comment('變數值');
                $table->string('memo',2048)->nullable()->comment('變數功能');
                $table->nullableTimestamps();
                $table->softDeletes();
            });
        }
        
        SystemVariable::create([
            'field' => 'contact_us_franchise_email_recipient',
            'value' => '[]',
            'memo'  => '聯絡我們-加盟諮詢-Email收件人',
        ]);
        
        SystemVariable::create([
            'field' => 'contact_us_opinion_email_recipient',
            'value' => '[]',
            'memo'  => '聯絡我們-意見反映-Email收件人',
        ]);

        SystemVariable::create([
            'field' => 'contact_us_cooperation_email_recipient',
            'value' => '[]',
            'memo'  => '聯絡我們-合作諮詢-Email收件人',
        ]);

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
