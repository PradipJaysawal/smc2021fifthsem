@if(Session::has('success'))

<div class="fixed right-4 top-4 bg-green-600 text-white px-20 py-4 z-50 rounded-lg" id="alert">
    <p class="text-xl font-bold">{{session('success')}}</p>
    <script>
        $msg = document.getElementById('alert');
        setTimeout(() =>{
            $msg.style.top = '-100px';
            $msg.style.transition = '0.5s';
        },2000);
    </script>
</div>
@endif


