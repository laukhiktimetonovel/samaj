@extends('layouts.app') @section('content')
<div class="w-full lg:w-[calc(100%_-_230px)]">
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        મુંબઈ - સુરતના ટ્રસ્ટીશ્રીઓ : ૨૦૨૦ - ૨૦૨૫
    </h2>
    <div>
        <div id="suratmumbaimembersGrid" class="grid grid-cols-2 xl:grid-cols-4 2xl:grid-cols-6 gap-2 sm:gap-4 mb-6"></div>
    </div>
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        સુરત : વ્યવસ્થાપક સમિતિ વર્ષ : ૨૦૨૩-૨૦૨૫
    </h2>
    <div>
        <div id="suratMemberGrid" class="grid grid-cols-2 xl:grid-cols-4 2xl:grid-cols-6 gap-2 sm:gap-4 mb-6"></div>
    </div>
    <h2 class="font-semibold text-xl md:text-2xl mb-4 text-center md:text-left text-[#575228]">
        મુંબઈ : વ્યવસ્થાપક સમિતિ વર્ષ : ૨૦૨૩-૨૦૨૫
    </h2>
    <div>
        <div id="mumbaiMemberGrid" class="grid grid-cols-2 xl:grid-cols-4 2xl:grid-cols-6 gap-2 sm:gap-4"></div>
    </div>
</div>
@endsection @push('scripts')
<script>
    const suratmumbaimembers = [
        {
            name: "શ્રી પ્રવિણભાઇ વલ્લભભાઇ પટેલ",
            role: "પ્રમુખ - ટ્રસ્ટી",
            place: "(પારડીઝાંખરી)",
            phone: "૯૨૦૯૫ ૪૭૮૭૦",
            image: "{{ asset('images/board_members/suratmumbaimembers-1.png') }}",
        },
        {
            name: "શ્રી છગનભાઇ નાથુભાઇ પટેલ",
            role: "ટ્રસ્ટી - મુંબઈ",
            place: "(લોઅર પરેલ વરીયાવ)",
            phone: "૭૦૪૫૩ ૪૭૪૫૩",
            image: "{{ asset('images/board_members/suratmumbaimembers-2.png') }}",
        },
        {
            name: "શ્રી મધુસુદનભાઇ પ્રેમાભાઇ પટેલ",
            role: "ટ્રસ્ટી - સુરત",
            place: "(બરબોધન - સુરત)",
            phone: "૯૮૨૫૧ ૨૦૨૦૨",
            image: "{{ asset('images/board_members/suratmumbaimembers-3.png') }}",
        },
        {
            name: "શ્રી ઠાકોરભાઇ રામુભાઇ પટેલ",
            role: "ટ્રસ્ટી - સુરત",
            place: "(ઇચ્છાપોર - સુરત)",
            phone: "૯૮૨૫૧ ૧૫૯૩૧",
            image: "{{ asset('images/board_members/suratmumbaimembers-4.png') }}",
        },
        {
            name: "શ્રી જયંતિભાઇ નારણભાઇ પટેલ",
            role: "ટ્રસ્ટી - સુરત",
            place: "(કોબા - ઓલપાડ)",
            phone: "૯૮૨૫૧ ૪૯૩૪૯",
            image: "{{ asset('images/board_members/suratmumbaimembers-5.png') }}",
        },
        {
            name: "શ્રી રમેશભાઇ માધવજીભાઇ પટેલ",
            role: "ટ્રસ્ટી - મુંબઈ",
            place: "(અરીયાણા - વિંકલી, મુંબઈ)",
            phone: "૯૯૩૦૪ ૦૫૮૫૧",
            image: "{{ asset('images/board_members/suratmumbaimembers-6.png') }}",
        },
        {
            name: "શ્રી મહેશભાઇ લલ્લુભાઇ પટેલ",
            role: "ટ્રસ્ટી - મુંબઈ",
            place: "(ઇચ્છાપોર - વિંકલી, મુંબઈ)",
            phone: "૯૮૨૦૦ ૦૧૫૦૩",
            image: "{{ asset('images/board_members/suratmumbaimembers-7.png') }}",
        },
    ];

    const suratmembers = [
        {
            name: "શ્રી ચંદુભાઇ દલપતભાઇ પટેલ",
            role: "અધ્યક્ષ (બલકસ)",
            phone: "૯૦૯૯૯ ૮૯૫૫૦",
            image: "{{ asset('images/board_members/suratmembers-1.png') }}",
        },
        {
            name: "શ્રી ગણપતભાઇ રણછોડભાઇ પટેલ",
            role: "ઉપાધ્યક્ષ (છરણપોર)",
            phone: "૯૮૨૫૫ ૯૩૯૪૦",
            image: "{{ asset('images/board_members/suratmembers-2.png') }}",
        },
        {
            name: "શ્રી હસમુખભાઇ બહેચરભાઇ પટેલ",
            role: "ઉપાધ્યક્ષ (સોસક)",
            phone: "૯૮૭૯૧ ૬૩૬૨૨",
            image: "{{ asset('images/board_members/suratmembers-3.png') }}",
        },
        {
            name: "શ્રી અરવિંદભાઇ જગજીવનભાઇ પટેલ",
            role: "મંત્રી (મલગામા)",
            phone: "૯૪૨૬૧ ૬૧૦૬૧",
            image: "{{ asset('images/board_members/suratmembers-4.png') }}",
        },
        {
            name: "શ્રીમતી જશુબેન બીપીનચંદ્ર પટેલ",
            role: "સહમંત્રી (ભેરાણ)",
            phone: "૯૮૭૯૧ ૫૫૯૪૬",
            image: "{{ asset('images/board_members/suratmembers-5.png') }}",
        },
        {
            name: "શ્રી શાંતિલાલ હરિભાઇ પટેલ",
            role: "સહમંત્રી (પાલણપોર)",
            phone: "૯૪૨૭૪ ૭૦૦૧૭",
            image: "{{ asset('images/board_members/suratmembers-6.png') }}",
        },
        {
            name: "શ્રી ચંદુભાઇ લક્ષ્મણભાઇ પટેલ",
            role: "ખજાનચી(અંબેટા)",
            phone: "૮૫૧૧૩ ૧૬૧૬૦",
            image: "{{ asset('images/board_members/suratmembers-7.png') }}",
        },
        {
            name: "શ્રી નરેન્દ્રભાઇ વનમાળીભાઇ પટેલ",
            role: "સહ-ખજાનચી (શેરડી)",
            phone: "૯૯૨૪૧ ૨૩૫૬૬",
            image: "{{ asset('images/board_members/suratmembers-8.png') }}",
        },
        {
            name: "શ્રી નટવરલાલ પષ્પાલાલ પટેલ",
            role: "કારોબારી સભ્ય(અરેરાણા)",
            phone: "-",
            image: "{{ asset('images/board_members/suratmembers-9.png') }}",
        },
        {
            name: "શ્રી મનોજભાઇ ગંગારામભાઇ પટેલ",
            role: "કારોબારી સભ્ય (કરંજ)",
            phone: "૯૯૦૯૦ ૦૬૮૮૮",
            image: "{{ asset('images/board_members/suratmembers-10.png') }}",
        },
        {
            name: "શ્રી ભગુભાઇ કુંવરજીભાઇ પટેલ",
            role: "કારોબારી સભ્ય (સુંવાલી)",
            phone: "૯૮૨૫૭ ૮૩૮૩૪",
            image: "{{ asset('images/board_members/suratmembers-11.png') }}",
        },
        {
            name: "શ્રી જયંતિભાઇ દલપતભાઇ પટેલ",
            role: "કારોબારી સભ્ય (ભાંડુત)",
            phone: "૯૯૨૫૮ ૧૫૪૯૫",
            image: "{{ asset('images/board_members/suratmembers-12.png') }}",
        },
        {
            name: "શ્રી રાજેશભાઇ કાળીદાસ પટેલ",
            role: "કારોબારી સભ્ય (અરેરાણા)",
            phone: "૯૮૨૫૧ ૬૧૭૫૦",
            image: "{{ asset('images/board_members/suratmembers-13.png') }}",
        },
        {
            name: "શ્રી જયેશભાઇ રણજીતભાઇ પટેલ",
            role: "કારોબારી સભ્ય (વરીયાવ)",
            phone: "૯૨૬૫૭ ૭૪૮૪૧",
            image: "{{ asset('images/board_members/suratmembers-14.png') }}",
        },
        {
            name: "શ્રી જગદીશભાઇ બાબરભાઇ પટેલ",
            role: "કારોબારી સભ્ય (કવારા)",
            phone: "૯૮૭૯૫ ૬૮૮૬૮",
            image: "{{ asset('images/board_members/suratmembers-15.png') }}",
        },
        {
            name: "શ્રી નિલેશકુમાર જશવંતભાઇ પટેલ",
            role: "કારોબારી સભ્ય (બેગમપુરા)",
            phone: "૮૯૮૦૩ ૬૩૮૫૮",
            image: "{{ asset('images/board_members/suratmembers-16.png') }}",
        },
        {
            name: "શ્રી રમેશભાઇ વિઠ્ઠલભાઇ પટેલ (આર.પી.)",
            role: "કારોબારી સભ્ય (અજાણ્યા)",
            phone: "૯૮૨૪૧ ૧૭૦૦૦",
            image: "{{ asset('images/board_members/suratmembers-17.png') }}",
        },
        {
            name: "શ્રી સંજયકુમાર જગજીવનભાઇ પટેલ",
            role: "કારોબારી સભ્ય (પાલ)",
            phone: "૯૮૯૮૦ ૧૬૦૦૦",
            image: "{{ asset('images/board_members/suratmembers-18.png') }}",
        },
        {
            name: "શ્રીમતી સાધનાબેન કાંતિભાઇ પટેલ",
            role: "કારોબારી સભ્ય (લીમડાકોરેક)",
            phone: "૯૪૨૭૮ ૮૫૨૮૫",
            image: "{{ asset('images/board_members/suratmembers-19.png') }}",
        },
        {
            name: "શ્રી જયેશભાઇ રામુભાઇ પટેલ",
            role: "કારોબારી સભ્ય (તેણા)",
            phone: "૯૮૭૯૬ ૮૮૪૮૧",
            image: "{{ asset('images/board_members/suratmembers-20.png') }}",
        },
        {
            name: "શ્રી ધર્મેશભાઇ નગીનભાઇ પટેલ",
            role: "કારોબારી સભ્ય (સાયણ)",
            phone: "૯૮૯૮૩ ૯૩૫૯૭",
            image: "{{ asset('images/board_members/suratmembers-21.png') }}",
        },
        {
            name: "શ્રી વિજયશકુમાર પ્રવીણભાઈ પટેલ",
            role: "કારોબારી સભ્ય (સેગવાઘમા)",
            phone: "૯૮૯૮૦ ૦૭૦૦૭",
            image: "{{ asset('images/board_members/suratmembers-22.png') }}",
        }
    ];

    const mumbaimembers = [
        {
            name: "શ્રી નરેશભાઇ પુરુષોત્તમભાઇ પટેલ",
            role: "અધ્યક્ષ (ગોરેગાવ, ભાંડુત)",
            phone: "૯૭૫૭૨ ૦૦૪૫૬",
            image: "{{ asset('images/board_members/mumbaimembers-1.png') }}",
        },
        {
            name: "શ્રી હસમુખભાઇ પરભુભાઇ પટેલ",
            role: "ઉપાધ્યક્ષ (વિક્રોલી, પીંજરત મોર)",
            phone: "૯૮૧૯૭ ર૭૧૧૬",
            image: "{{ asset('images/board_members/mumbaimembers-2.png') }}",
        },
        {
            name: "શ્રી પ્રાણજીવનભાઇ મગનભાઇ પટેલ",
            role: "ઉપાધ્યક્ષ (વિરાર, અસનાડ)",
            phone: "૯૮૧૯૩ ૪૧૮૦૧",
            image: "{{ asset('images/board_members/mumbaimembers-3.png') }}",
        },
        {
            name: "શ્રીમતી હેમાબેન રમેશભાઇ પટેલ",
            role: "મંત્રી (દહીસર, કપાસી)",
            phone: "૯૯૬૯૫ ૭૪૨૬૪",
            image: "{{ asset('images/board_members/mumbaimembers-4.png') }}",
        },
        {
            name: "શ્રી પરેશભાઇ ઠાકોરભાઇ પટેલ",
            role: "સહમંત્રી (મુલુન્ડ, વાંસવા)",
            phone: "૯૯૬૭૮ ૧૬૯૧૦",
            image: "{{ asset('images/board_members/mumbaimembers-5.png') }}",
        },
        {
            name: "શ્રી મહેન્દ્રભાઇ જમુભાઇ પટેલ",
            role: "સહમંત્રી (વિક્રોલી, કુવાદ)",
            phone: "૯૮૨૦૨ ૬૨૮૧૭",
            image: "{{ asset('images/board_members/mumbaimembers-6.png') }}",
        },
        {
            name: "શ્રી ત્રિકેશભાઇ ગણપતભાઇ પટેલ",
            role: "ખજાનચી (લોઅર પરેલ, પીંજરત )",
            phone: "૯૯૬૯૨ ૬૮૭૬૮",
            image: "{{ asset('images/board_members/mumbaimembers-7.png') }}",
        },
        {
            name: "શ્રી મનોજભાઇ વનમાળીભાઇ પટેલ",
            role: "સહ-ખજાનચી (દાદર, ભટલાઇ)",
            phone: "૯૮૧૯૨ ૯૭૬૦૨",
            image: "{{ asset('images/board_members/mumbaimembers-8.png') }}",
        },
        {
            name: "શ્રી પરસોત્તમભાઇ નરોત્તમભાઇ પટેલ",
            role: "કારોબારી સભ્ય (વિક્રોલી, માસમા)",
            phone: "૯૯૦૯૮ ૭૧૦૭૮",
            image: "{{ asset('images/board_members/mumbaimembers-9.png') }}",
        },
        {
            name: "શ્રી ધીરજભાઇ લલ્લુભાઇ પટેલ",
            role: "કારોબારી સભ્ય (કલવા, તેનારાંગ)",
            phone: "૯૩૭૪૯ ૧૩૯૦૧",
            image: "{{ asset('images/board_members/mumbaimembers-10.png') }}",
        },
        {
            name: "શ્રીમતી દક્ષાબેન નરેશભાઇ પટેલ",
            role: "કારોબારી સભ્ય (ગોરેગાવ, ભાંડુત)",
            phone: "૯૭૦૨૫ ૧૦૦૪૭",
            image: "{{ asset('images/board_members/mumbaimembers-11.png') }}",
        },
        {
            name: "શ્રી કાંતિભાઇ મગનભાઇ પટેલ",
            role: "કારોબારી સભ્ય (મુલુન્ડ, મીરજાપોર)",
            phone: "૯૩૨૪૭ ૧૯૨૬૮",
            image: "{{ asset('images/board_members/mumbaimembers-12.png') }}",
        },
        {
            name: "શ્રી ધનસુખભાઇ ઝીણાભાઇ પટેલ",
            role: "કારોબારી સભ્ય (જોગેશ્રી, રાજગરી)",
            phone: "૯૮૬૯૧ ૪૭૦૨૨",
            image: "{{ asset('images/board_members/mumbaimembers-13.png') }}",
        },
        {
            name: "શ્રી પરેશભાઇ જમુભાઇ પટેલ",
            role: "કારોબારી સભ્ય (વિક્રોલી, નાના ખોસાડીયા)",
            phone: "૯૮૨૧૭ ૦૭૨૨૧",
            image: "{{ asset('images/board_members/mumbaimembers-14.png') }}",
        },
        {
            name: "શ્રી પ્રિતેશભાઇ રમેશભાઇ પટેલ",
            role: "કારોબારી સભ્ય (દહીસર, ભાંડુત)",
            phone: "૯૮૧૯૯ ૬૮૬૫૫",
            image: "{{ asset('images/board_members/mumbaimembers-15.png') }}",
        },
        {
            name: "શ્રી હર્ષદભાઇ મોહનભાઇ પટેલ",
            role: "કારોબારી સભ્ય (કાંદીવલી, અરીયાણા)",
            phone: "૭૯૭૭૬ ૦૮૧૦૪",
            image: "{{ asset('images/board_members/mumbaimembers-16.png') }}",
        },
        {
            name: "શ્રી હિતેન્દ્રભાઇ ઠાકોરભાઇ પટેલ",
            role: "કારોબારી સભ્ય (મલાડ, વેડ)",
            phone: "૯૯૩૦૨ ૪૭૦૫૨",
            image: "{{ asset('images/board_members/mumbaimembers-17.png') }}",
        },
        {
            name: "શ્રી આશિષભાઇ મધુસુદનભાઇ પટેલ",
            role: "કારોબારી સભ્ય (અંધેરી , કતારગામ )",
            phone: "૯૮૨૧૦ ૧૪૨૯૯",
            image: "{{ asset('images/board_members/mumbaimembers-18.png') }}",
        },
        {
            name: "શ્રી મુકેશભાઇ ગણપતભાઇ પટેલ",
            role: "કારોબારી સભ્ય (મલાડ, પારડી ઝાંખરી)",
            phone: "૮૦૯૭૩ ૩૦૦૭૩",
            image: "{{ asset('images/board_members/mumbaimembers-19.png') }}",
        },
        {
            name: "શ્રી મહેશભાઇ ધીરજભાઇ પટેલ",
            role: "કારોબારી સભ્ય (કાંદીવલી, દામકા)",
            phone: "૯૮૨૦૨ ૧૯૯૧૧",
            image: "{{ asset('images/board_members/mumbaimembers-20.png') }}",
        },
        {
            name: "શ્રી ભાવેશભાઇ ઠાકોરભાઇ પટેલ",
            role: "કારોબારી સભ્ય (વિક્રોલી, પિંજરત)",
            phone: "૯૮૩૩૮ ૮૯૮૯૬",
            image: "{{ asset('images/board_members/mumbaimembers-21.png') }}",
        },
        {
            name: "શ્રી પ્રતિકભાઇ ધનસુખભાઇ પટેલ",
            role: "કારોબારી સભ્ય (જોગેશ્વરી, રાજગરી)",
            phone: "૯૮૬૯૧ ૪૭૦૨૨",
            image: "{{ asset('images/board_members/mumbaimembers-22.png') }}",
        },
    ];

    function renderMembers(containerId, members) {
        const container = document.getElementById(containerId);
        const html = members
            .map(
                (member) => `
            <div class="bg-white rounded-xl shadow p-2 sm:p-3 text-center flex flex-col gap-3 sm:gap-4">
                <div class="w-full h-auto relative overflow-hidden">
                    <div class="relative overflow-hidden w-full block h-full pt-[100%] rounded-xl">
                        <img src="${member.image}" class="absolute h-full w-full object-contain left-0 top-0" loading="lazy" alt="${member.name}" />
                    </div>
                </div>
                <div class="flex-col gap-1 flex flex-1">
                    <h2 class="font-semibold md:font-bold sm:text-lg flex-1">${member.name}</h2>
                    <p class="text-[#575228] text-sm">${member.role}</p>
                    ${member.place ? `<p class="text-sm text-orange-500">${member.place}</p>` : ""}
                    ${member.phone ? `<p>મોબાઈલ નંબર: ${member.phone}</p>` : ""}
                </div>
            </div>
        `
            )
            .join("");
        container.innerHTML = html;
    }

    renderMembers("suratmumbaimembersGrid", suratmumbaimembers);
    renderMembers("suratMemberGrid", suratmembers);
    renderMembers("mumbaiMemberGrid", mumbaimembers);
</script>
@endpush