
@php
    $list_root_category=DB::table("Categories")->where('parent','=',null)->get();/*video 34 phust 48:00*/
    $list_sub_category=DB::table("Categories")->where('parent','!=',null)->where('lever1','=',null)->get();/*video 34 phust 48:00*/
    $list_lever1_category=DB::table("Categories")->where('lever1','!=',null)->get();/*video 34 phust 48:00*/
@endphp

<div style="margin-bottom: 30px">
    <div style="margin: 0;padding: 15px;background: #f0f0f0;border-color: #d3d3d3;border-width: 1px 1px 0 1px;border-style: solid;">

        @foreach($list_root_category as $root_category)
            <h4 style="font-weight: bold">{{$root_category->category_name}}</h4>
            @foreach($list_sub_category as $sub_category)
                @if($sub_category->parent==$root_category->id)
                    <ul class="ulnone">
                        <li><a class="megamenu-item font-sans" href="{{route('danh-muc',$sub_category->id)}}">{{$sub_category->category_name}}</a></li>
                        @foreach($list_lever1_category as $lever1_category)

                            @if($lever1_category->lever1==$sub_category->id)
                                <li><a class="megamenu-item font-sans" href="{{route('lever1',$lever1_category->id)}}">{{$lever1_category->category_name}}</a></li>
                            @endif
                        @if($lever1_category->lever1==$sub_category->id)
                                <li><a class="megamenu-item font-sans" href="{{route('lever1',$lever1_category->id)}}">{{$lever1_category->category_name}}</a></li>
                        @endif
                        @endforeach
                    </ul>
                @endif
            @endforeach
            <hr>
        @endforeach






        <h5 style="font-weight: bold">Kích thước</h5>
        <ul>
            <li>Size X</li>
            <li>Size M</li>
            <li>Size L</li>
            <li>Size Xl</li>
            <li>Size XXL</li>
            <li>Size XXXL</li>
            <li>34</li>
            <li> 100(96)</li>
            <li>110(96)</li>
            <li>120(94)</li>
            <li> 140(41)</li>
            <li>130(53)</li>
            <li> 10(1)</li>
            <li> 11(9)</li>
            <li>12(1)</li>
            <li>13(9)</li>
            <li> 27(3)</li>
            <li>28(125)</li>
            <li> 29(166)</li>
            <li>30(165)</li>
            <li>31(166)</li>
            <li>32(167)</li>
            <li>70(1)</li>
            <li>80(44)</li>
            <li>33(55)</li>
            <li>39(34)</li>
            <li>40(43)</li>
            <li>41(43)</li>
            <li>90(84)</li>
            <li>42(41)</li>
            <li>43(40)</li>
            <li>5(9)</li>
            <li>6(1)</li>
            <li> 7(9)</li>
        </ul>
    </div>
</div>
