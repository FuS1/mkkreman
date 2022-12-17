<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'food';

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
                // $table->mediumText('content')->nullable()->comment('商品內文');
                $table->string('type')->nullable()->comment('商品分類');
                $table->integer('is_recommendation')->default(0)->comment('是否顯示於人氣推薦');
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
