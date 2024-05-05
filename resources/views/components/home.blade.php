<!DOCTYPE html>
<html lang="en">
@include('components.header')
<body class="font-inter">
    @include('components.menu')
    {{$slot}}
    @include('components.footer')
</body>
</html>