@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-6">
    <div class="header">
        <h4 style="padding:10px" class="title">Box Diagram Example</h4>
    </div>
    <div style="div1">
        @php
            $max_per_row = 4;
            $max_per_cols = 4;
            $i = 1;
        @endphp
        <table class="table table-bordered table-hover table-responsive">
        <tr>
        @for ($tr=1;$tr<=$max_per_row;$tr++)
            <tr>
                @for($td=1;$td<=$max_per_cols;$td++)
                    @php
                        $style = isset($sentences[$i]["style"]) ? $sentences[$i]["style"] : '';
                        $colour = isset($sentences[$i]["colour"]) ? 'background-color:'.$sentences[$i]["colour"] : '';

                        if (!empty($style))
                        {
                            $tdstyle = $style.";".$colour;    
                        }else{
                            $tdstyle  = $colour;
                        }
                    @endphp
                    <td style=" {{ $tdstyle }} ">{{ isset($sentences[$i]["name"]) ? $sentences[$i]["name"] : ' ' }}</td>
                    @php
                        $i++;
                    @endphp
                @endfor 
            </tr>
        @endfor   
        </table>
    </div>
</div>
</div>

@endsection