<div class="flex pl-12">
    <nav class="flex flex-col text-white">
        <a class="{{App::getLocale() == 'en' ? "order rounded-full px-2 py-1 mb-7 bg-white text-black" : "border rounded-full px-2 py-1 mb-7"}}" href="{{route('locale.change', 'en')}}">en</a>
        <a class="{{App::getLocale() == 'ka' ? "order rounded-full px-2 py-1 mb-7 bg-white text-black" : "border rounded-full px-2 py-1 mb-7"}}" href="{{route('locale.change', 'ka')}}">ka</a>
    <nav>
</div>