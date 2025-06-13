<div id="sidebar-container" class="min-w-[300px]">
    <div id="skeleton-grid" class="">
        <header class="flex items-center py-2 relative gap-3 px-4 h-[90px]">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="લોગો" class="min-w-[65px] max-w-[65px]" loading="lazy" />
            </a>
            <div class="text-left">
                <h1 class="text-black font-bold text-[16px] leading-none pb-1.5">
                    તળપદા કોળી પટેલ સમાજ
                </h1>
                <p class="text-black font-semibold text-sm leading-none">
                    (United We Stand)
                </p>
            </div>
        </header>
        <nav id="sidebar" class="grid grid-cols-3 md:grid-cols-2 gap-2 md:gap-4 p-4 min-w-[300px] md:max-h-[calc(100vh_-_90px)] md:overflow-y-auto">
            <a href="{{ route('home') }}" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2
                {{ request()->route()->getName() == 'home' || Request::is('family-book*') || Request::is('family-members*') ? 'page-active' : '' }}">
                <img src="{{ asset('images/icons/family-list.svg') }}" alt="family-list" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">ગામની ની યાદી</span>
            </a>


            <a href="{{ route('board.index','board_members') }}" data-match="board-users.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "board.index" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/board-users.svg') }}" alt="board-users" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">મંડળના હોદ્દારોઃ</span>
            </a>

            <a href="{{ route('pages.snehmilan-information') }}" data-match="snehmilan-information.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "pages.snehmilan-information" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/snehmilan-information.svg') }}" alt="snehmilan-information" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">સ્નેહમિલનની માહિતી</span>
            </a>

            <a href="{{ route('pages.important-numbers') }}" data-match="important-numbers.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "pages.important-numbers" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/important-numbers.svg') }}" alt="important-numbers" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">અગત્યના નંબરો</span>
            </a>

            {{-- <a href="javascript:void(0);" onclick="alert('કાર્ય પ્રગતિમાં છે, જલ્દી જ આ ફીચર ઉમેરવામાં આવશે.');" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2">
                <img src="{{ asset('images/icons/photo-gallery.svg') }}" alt="photo-gallery" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
            <span class="text-xs md:text-[15px] sidebar-text">ફોટો ગેલેરી</span>
            </a> --}}
            
            <a href="{{ route('pages.matrimony') }}" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "pages.matrimony" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/marriage-related.svg') }}" alt="marriage-related" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
            <span class="text-xs md:text-[15px] sidebar-text">લગ્ન વિષયક</span>
            </a>

            <a href="{{ route('mass-marriage-Information') }}" data-match="mass-marriage-Information.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "mass-marriage-Information" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/mass-marriage-Information.svg') }}" alt="mass-marriage-Information" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">સમુહલગ્નની માહિતી</span>
            </a>

            <a href="{{ route('village-history') }}" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "village-history" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/village-history.svg') }}" alt="village-history" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">સમાજનો ઇતિહાસ</span>
            </a>

            <a href="{{ route('pages.find-business') }}" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "pages.find-business" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/business.svg') }}" alt="village-history" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">વ્યવસાય શોધો</span>
            </a>


            <a href="{{ route('pages.add-product') }}" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "pages.add-product" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/farmar.svg') }}" alt="village-history" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">ખેડૂત વિષયક</span>
            </a>

             <a href="{{ route('pages.product-report') }}" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "pages.product-report" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/report-farmar.svg') }}" alt="village-history" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">પાક શોધો</span>
            </a>


            <a href="{{ route('family.search') }}" data-match="search-user.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "family.search" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/search-user.svg') }}" alt="search-user" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">સભ્ય શોધો</span>
            </a>

            <a href="{{ route('login') }}" data-match="add-users.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ in_array(request()->route()->getName(),['login','family.profile','family.profile.editMain','family.child.create','family.child.edit']) ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/add-users.svg') }}" alt="add-users" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">નવો સભ્ય ઉમેરો</span>
            </a>

            <a href="{{ route('members.report') }}" data-match="report-of-members.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "members.report" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/report-of-members.svg') }}" alt="report-of-members" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">સભ્યોની રિપોર્ટ</span>
            </a>

            <a href="{{ route('pages.help') }}" data-match="help.php" class="bg-white border shadow-[0px_6px_10px_5px_#dcdcdc2b] rounded-[10px] border-solid border-[#dfdfdf] flex items-center justify-center flex-col text-center cursor-pointer gap-2 md:gap-3.5 md:py-3 py-2 px-2 {{ request()->route()->getName() == "pages.help" ? 'page-active' : ''}}">
                <img src="{{ asset('images/icons/board-users.svg') }}" alt="board-users" loading="lazy" class="min-h-[30px] md:min-h-[40px] max-w-[30px] max-h-[30px] md:max-h-[40px] md:max-w-[40px] object-contain" />
                <span class="text-xs md:text-[15px] sidebar-text">App માર્ગદર્શિકા</span>
            </a>
        </nav>
    </div>
</div>
