<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'admin';

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
                $table->bigIncrements('id')->comment('序號(6位數英數混雜)');
                $table->string('name')->comment('姓名');
                $table->string('account')->comment('帳號');
                $table->string('password', 2048)->comment('密碼');
                $table->dateTime('disabled_at')->nullable()->comment('帳戶禁用時間');
                $table->nullableTimestamps();
                $table->unique(["account"], 'account');
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
