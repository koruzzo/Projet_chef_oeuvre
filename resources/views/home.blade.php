<x-app-layout>

    <div class="header-bar">
        <div class="scrolling-text font-exo-2">
            <p>
                Bienvenue sur sur APIBLOG un annuaire et blog d'apiculteur, en ce moment
                <span id="apiculteur-count">{{$apiculteurCount}}</span> Apiculteurs sont enregistrés et
                <span id="apifan-count">{{$apifanCount}}</span> Api-Fans sont enregistrés
            </p>
        </div>
    </div>

    <div class="p-4 mx-auto mt-5 w-3/4 flex justify-center flex-col " style="background-color: rgba(214, 214, 214, 0.075); border: 2px solid rgba(0, 0, 0, 0.048);">
        <h1 class="flex mx-auto pb-5 text-xl font-exo-2 mt-5 font-bold"> Lorem ipsum dolor sit amet </h1>
    </div>

    <div class="lg:flex justify-center mt-5 pt-5 conteneur-">
        
        <div class="lg:w-600 h-600">
            <img class="h-full w-full object-cover object-center border-miel "
                src="{{asset('images/accueil/accueil.png')}}" alt="Image d'accueil">
        </div>

        <div class="lg:w-1/2 p-4 bg-gray-100 lg:flex lg:items-center">
            <p class="p-4 text-xl font-exo-2 text-center">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel dui ac massa pretium viverra ac a magna. 
                Vivamus dapibus mi vitae lectus commodo commodo mollis nec sapien. Suspendisse interdum ac leo ut commodo. Sed 
                tempus purus risus, euismod consequat neque hendrerit sit amet. Morbi tristique interdum nulla et sodales. 
                Maecenas felis justo, elementum et vestibulum vitae, finibus ut eros. Donec accumsan at lorem at tempor.
                Aliquam in mi hendrerit felis ornare viverra non ac lectus. Pellentesque maximus, ligula eget venenatis aliquam, 
                metus velit placerat ligula, sit amet eleifend turpis dui id dolor. Vestibulum nec rhoncus tellus, ut consectetur 
                tellus. Phasellus quam justo, ornare vitae arcu ut, condimentum pretium diam. Proin sapien libero, maximus quis 
                justo non, iaculis varius augue. Maecenas ullamcorper lacus sed est accumsan tincidunt. Curabitur ipsum sem, rhoncus 
                vel imperdiet et, ornare eu dolor. Donec metus nulla, facilisis eu fringilla id, gravida in est.
               <br>
               <br>
               <br>
                Maecenas convallis 
                sem sit amet dui porttitor, ut rhoncus metus fermentum. Morbi mauris nunc, hendrerit non nibh nec, tempus hendrerit 
                nunc. Proin dolor nunc, varius non lacus sit amet, bibendum congue augue. Integer luctus eleifend gravida. Mauris 
                porta leo nec efficitur fermentum.Sed tempus purus risus, euismod consequat neque hendrerit sit amet. 
                Morbi tristique interdum nulla et sodales. Maecenas felis justo, elementum et vestibulum vitae, finibus ut eros. 
                Donec accumsan at lorem at tempor.
            </p>
        </div>
    </div>
</x-app-layout>