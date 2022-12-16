<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\ErrorException;
use App\Models\PageContent;

class PageContentController extends Controller
{

    public function editor(Request $request)
    {
        $pageContent = PageContent::where('page',$request->page)->first();
        
        return view('AdminPage.page_editor', [
            'pageContent' => $pageContent
        ]);
    }

    public function getPageContent(Request $request)
    {
        $pageContent = PageContent::where('page',$request->page)->first();

        return response($pageContent,200);
    }

    public function savePageContent(Request $request)
    {
        $pageContent = PageContent::updateOrCreate(
        [
            'page'   => $request->page,
        ],[
            'content'=> empty($request->content) ? null : $request->content,
        ]);

        // 如果有上傳新的檔案，則更新
        if( !empty($request->banner_file) ){

            $fileInfo = [
                'filePath' => 'page_banner',
                'fileName' => Str::orderedUuid().".".($request->banner_file->getClientOriginalExtension()==='' ? $request->banner_file->clientExtension():$request->banner_file->getClientOriginalExtension()),
            ];
            
            $uploadResult = Storage::disk('public')->put($fileInfo['filePath'].'/'.$fileInfo['fileName'], file_get_contents($request->banner_file));    

            $pageContent->update([
                'banner_file_path' => $fileInfo['filePath'] .'/'.$fileInfo['fileName'] ,
            ]);

        }

        return response($pageContent->refresh(),200);
        
    }

}
