{{-- Header --}}
<div class = "fixed w-full z-30 flex bg-white dark:bg-[#0F172A] p-2 items-center justify-center h-16 px-10">
    <div
        class = "logo ml-12 dark:text-white  transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
        DESA
    </div>
    <!-- SPACER -->
    <div class = "grow h-full flex items-center justify-center"></div>
    <div class = "flex-none h-full text-center flex items-center justify-center">

        <div class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
                <div class="flex-shrink-0 w-10 h-10 relative">
                    <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                        <img class="w-8 h-8 rounded-full"
                            src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/9.jpg"
                            alt="" />
                        <div
                            class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping">
                        </div>
                        <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full">
                        </div>
                    </div>
                </div>
                <div class="p-2 md:block text-left">
                    <h2 class="text-sm font-semibold text-gray-800 dark:text-white">Noor Akhnafal Aban</h2>
                    <p class="text-xs text-gray-500 dark:text-[#ffffff] dark:text-opacity-75">Super Admin</p>
                </div>
            </button>
            <ul
                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                <li>
                    <a href="#"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                </li>
                {{-- <li>
                    <form method="POST" action="">
                        <a role="menuitem"
                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                </li> --}}
                <li>
                    <a href="/home"
                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Log Out</a>
                </li>
            </ul>
        </div>

    </div>
</div>
