<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\PageContent;

class CreatePageContentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'page_content';

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
                $table->string('page')->nullable()->comment('頁面代碼');
                $table->string('banner_file_path',2048)->nullable()->comment('頁面上方大圖檔案儲存位置');
                $table->mediumText('content')->nullable()->comment('頁面內容');
                $table->mediumText('bottom_content')->nullable()->comment('底部頁面內容');
                $table->nullableTimestamps();
                $table->softDeletes();
            });

            // 徵才資訊
            PageContent::create([
                'page'   => 'recruitment',
                'content'=> null,
                'bottom_content'=> null,
            ]);

            // 關於我們資訊
            PageContent::create([
                'page'   => 'about_us',
                'content'=> null,
                'bottom_content'=> null,
            ]);

            // 聯絡我們資訊
            PageContent::create([
                'page'   => 'contact_us',
                'content'=> null,
                'bottom_content'=> null,
            ]);

            // 美味餐點資訊
            PageContent::create([
                'page'   => 'food',
                'content'=> null,
                'bottom_content'=> null,
            ]);

            // 最新消息資訊
            PageContent::create([
                'page'   => 'food',
                'content'=> null,
                'bottom_content'=> null,
            ]);

            // 我要加盟資訊
            PageContent::create([
                'page'   => 'seminar',
                'content'=> null,
                'bottom_content'=> null,
            ]);
            
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
