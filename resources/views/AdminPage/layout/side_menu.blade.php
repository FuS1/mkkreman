<aside class="w-full" aria-label="Sidebar">
   <div class="overflow-y-auto overflow-x-hidden py-4 px-3 rounded h-screen w-full">
      <a href="/" target="_blank" class="flex items-center pl-2.5 mb-5">
         <img src="/AdminPage/img/favicon.png" class="mr-3 h-6" alt="Logo" />
         <span class="self-center text-xl font-semibold whitespace-nowrap text-white">麵匡匡拉麵食堂</span>
      </a>
      <ul class="space-y-2">
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-index" data-collapse-toggle="dropdown-index">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-light fa-pager"></i>
               </div>                  
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>首頁</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-index" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/banner_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">Banner</a>
               </li>
               <li>
                  <a href="/_admin_/hot_food_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">人氣推薦列表</a>
               </li>
            </ul>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-about-us" data-collapse-toggle="dropdown-about-us">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-duotone fa-seal-question"></i>
               </div>                  
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>關於我們</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-about-us" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/about_us_main_content" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁面設定</a>
               </li>
               <li>
                  <a href="/_admin_/about_us/person_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">麵匡匡人物列表</a>
               </li>
            </ul>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-food" data-collapse-toggle="dropdown-food">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-solid fa-pot-food"></i>
               </div>                 
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>美味餐點</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-food" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/food_main_content" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁面設定</a>
               </li>
               <li>
                  <a href="/_admin_/main_food_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">拉麵系列列表</a>
               </li>
               <li>
                  <a href="/_admin_/side_food_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">美味小菜列表</a>
               </li>
               <li>
                  <a href="/_admin_/drink_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">清爽飲品列表</a>
               </li>
            </ul>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-news" data-collapse-toggle="dropdown-news">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-solid fa-message-lines"></i>
               </div>                 
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>最新消息</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-news" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/news_main_content" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁面設定</a>
               </li>
               <li>
                  <a href="/_admin_/news_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">最新消息列表</a>
               </li>
            </ul>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-store" data-collapse-toggle="dropdown-store">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-solid fa-store"></i>
               </div>                  
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>門市資訊</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-store" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/store_main_content" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁面設定</a>
               </li>
               <li>
                  <a href="/_admin_/store_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">門市資訊列表</a>
               </li>
            </ul>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-recruitment" data-collapse-toggle="dropdown-recruitment">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-duotone fa-people-group"></i>
               </div>                  
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>人才招募</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-recruitment" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/recruitment_main_content" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁面設定</a>
               </li>
            </ul>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-join-seminar" data-collapse-toggle="dropdown-join-seminar">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-sharp fa-solid fa-screen-users"></i>
               </div>
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>我要加盟</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-join-seminar" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/seminar_main_content" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁面設定</a>
               </li>
               <li>
                  <a href="/_admin_/seminar_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">講座列表</a>
               </li>
               <li>
                  <a href="/_admin_/seminar_post_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">創業知識部落格</a>
               </li>
               <li>
                  <a href="/_admin_/seminar_story_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">創業故事</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="/_admin_/footer" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁尾設定</a>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-join-contact-us" data-collapse-toggle="dropdown-join-contact-us">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-solid fa-envelope"></i>
               </div>
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>聯絡我們</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-join-contact-us" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/contact_us_main_content" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">頁面設定</a>
               </li>
               <li>
                  <a href="/_admin_/contact_us_email" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">Email 收件人</a>
               </li>
            </ul>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold" aria-controls="dropdown-system-setting" data-collapse-toggle="dropdown-system-setting">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-blue-900 dark:group-hover:text-white scale-125 pt-1.5 fa-solid fa-gear"></i>
               </div>                  
               <div class="flex-1 ml-5 text-left whitespace-nowrap" sidebar-toggle-item>系統設定</div>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-system-setting" class="hidden py-2 space-y-2">
               <li>
                  <a href="/_admin_/admin_list" class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-[#062851] hover:font-bold">後台帳戶</a>
               </li>
            </ul>
         </li>
      </ul>
      <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
         <li>

            <span class="flex items-center p-2 text-base font-normal text-white rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-red-700 dark:text-white group hover:text-red-700 hover:font-bold hover:cursor-pointer btn-change-password" data-modal-toggle="change-password-modal">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-700 dark:group-hover:text-white scale-125 pt-1.5 pl-1.5 fa-sharp fa-solid fa-circle-p"></i>
               </div>
               <div class="flex-1 ml-5 text-left whitespace-nowrap">變更密碼</div>
            </span>
         </li>
         <li>
            <span class="flex items-center p-2 text-base font-normal text-white rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-red-700 dark:text-white group hover:text-red-700 hover:font-bold hover:cursor-pointer btn-logout">
               <div class="w-4">
                  <i class="flex-shrink-0 w-8 h-8 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-700 dark:group-hover:text-white scale-125 pt-1.5 pl-1.5 fa-solid fa-arrow-up-left-from-circle"></i>
               </div>
               <div class="flex-1 ml-5 text-left whitespace-nowrap">登出</div>
            </span>
         </li>
      </ul>
   </div>
</aside>

<!-- Main modal -->
<div id="change-password-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
		<div class="relative p-4 w-full max-w-md h-full md:h-auto">
			<!-- Modal content -->
			<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
				<!-- Modal header -->
				<div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
					<h3 class="text-xl font-medium text-gray-900 dark:text-white">
						變更密碼
					</h3>
					<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="change-password-modal">
						<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
						<span class="sr-only">Close modal</span>
					</button>
				</div>
				<!-- Modal body -->
				<div class="py-6 px-6 lg:px-8">
					<form class="space-y-6" action="#">
						<div>
							<label for="password" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">原始密碼</label>
							<input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
						</div>
						<div>
							<label for="new_password" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">新密碼</label>
							<input type="password" name="password_new" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
						</div>
						<div>
							<label for="new_password_2" class="block border-l-8 border-l-[#062851] pl-2 py-1 mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">再次輸入新密碼</label>
							<input type="password" name="password_new_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
						</div>
					</form>
				</div>
				<!-- Modal footer -->
				<div class="py-6 text-center">
					<button id="btn-change-password" type="button" class="text-white bg-[#062851] hover:bg-[#03152b] focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-blue-100 focus:z-10">儲存</button>
				</div>
			</div>
		</div>
	</div>




<script>
   $(function(){

      $('#btn-change-password').on('click',function(){
         let form = $("#change-password-modal form");
         if( form[0].reportValidity() ){
            let data = getFormData(form);
            if(data['password_new'] !== data['password_new_2']){
               Swal.fire({
                  icon: 'error',
                  text: '兩次新密碼不相同',
               });
               return;
            }
            exec('admin/password','PUT',getFormData(form),function(response){
               Swal.fire({
                  title: '變更完成，請重新登入',
               }).then(function(result) {
                  setLocalStorage('adminData',null);
                  window.location.assign('./login');
               });
            });
         }
      });

      $('.btn-logout').on('click',function(){
         setLocalStorage('adminData',null);
			window.location.assign('./login');
      });
   });
</script>