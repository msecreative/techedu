@if (Session('success'))
    <div class="text-center bg-green-300 text-white py-2 mt-12" id="stMsg">
        <p>{{Session('success')}}</p>
    </div>
@endif
