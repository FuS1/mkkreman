<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'drink';

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
                $table->string('title')->nullable()->comment('商品名');
                $table->mediumText('short_description')->nullable()->comment('商品短描述');
                $table->string('file_path',2048)->nullable()->comment('檔案儲存位置');
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
