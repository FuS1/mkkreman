<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'news';

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
                $table->string('banner_file_path',2048)->nullable()->comment('資訊頁圖檔檔案儲存位置');
                $table->dateTime('started_at')->nullable()->comment('活動開始時間');
                $table->dateTime('ended_at')->nullable()->comment('活動結束時間');
                $table->tinyInteger('is_top')->default(0)->comment('是否置頂');
                $table->tinyInteger('show_in_index')->default(0)->comment('是否顯示於首頁');
                $table->mediumText('content')->nullable()->comment('文章內容');
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
