@include('client.shared._header')
<div class="container" id="app">
    <example-component
        :fullname="'{{auth()->user()->fullname}}'"
        :label="'{{$test->fullname}}'"
        :t-id="{{$test->id}}"
    ></example-component>
</div>
<script type="text/javascript" src="/js/app.js"></script>
@include('client.shared._footer')