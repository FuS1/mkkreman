<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarPostTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'seminar_post';

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
                $table->string('title')->nullable()->comment('大圖標題');
                $table->string('content')->nullable()->comment('文章內容');
                $table->string('file_path')->nullable()->comment('檔案儲存位置');
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
