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
                $table->string('title')->nullable()->comment('標題');
                $table->string('short_description')->nullable()->comment('簡短描述');
                $table->string('file_path',2048)->nullable()->comment('檔案儲存位置');
                $table->string('banner_file_path',2048)->nullable()->comment('檔案儲存位置');
                $table->mediumText('content')->nullable()->comment('文章內容');
                $table->tinyInteger('show_in_index')->default(0)->comment('是否顯示於首頁');
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
