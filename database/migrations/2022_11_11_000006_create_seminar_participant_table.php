<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarParticipantTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'seminar_participant';

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
                $table->biginteger('seminar_id');
                $table->string('name')->nullable()->comment('姓名');
                $table->string('gender')->nullable()->comment('性別');
                $table->integer('age_range')->nullable()->comment('年齡區間');
                $table->string('phone_number')->nullable()->comment('手機號碼');
                $table->string('contact_number')->nullable()->comment('聯絡電話');
                $table->string('contact_time')->nullable()->comment('方便聯絡時間');
                $table->string('receive_type')->nullable()->comment('收件方式');
                $table->string('receive_detail')->nullable()->comment('收件細節');
                $table->string('email')->nullable()->comment('電子信箱');
                $table->integer('amount')->default(1)->comment('出席人數');
                $table->mediumText('memo')->nullable()->comment('備註');
                $table->integer('is_check')->default(0)->comment('是否已確認');
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
