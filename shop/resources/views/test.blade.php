<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
    <link rel="stylesheet" type="text/css" href="/styles/custom_mat.css">
</head>
<body>
@foreach($parentCategories as $taxonomy)
    @php
        $i = 1;
    @endphp
    <button class="category__item category__depth_{{$i}}"><a class="text text_gray"
                                                          href="/scoped/{{$taxonomy->Category_id}}/{{$taxonomy->Name}}/">{{$taxonomy->Name}}</a>
    </button>
    @if(count($taxonomy->subcategory))

    @include('sub_cat',['subcategories' => $taxonomy->subcategory, 'i' => $i])
    @endif
    @endforeach
</select>


</body>
</html>