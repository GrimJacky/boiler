@extends('dashboard::layouts.dashboard')
@section('title','Company')
@section('description', 'create company')
@section('navbar')
@stop
@section('content')
    <div class="app-content-body app-content-full" id="role" data-post-id="sdf">
        <!-- hbox layout  -->
        @include('dashboard::partials.alert')
        <form class="hbox hbox-auto-xs bg-light" id="role-form" method="post" action="{{route('dashboard.create.company')}}"
              enctype="multipart/form-data">
            <div class="col  lter b-r">
                <div class="vbox">
                    <div class="bg-white">
                        <div class="tab-content">
                            <div class="tab-pane  active  " id="local-en">
                                <div class="wrapper-xl  bg-white">
                                    <div class="form-group">
                                        <label for="field-from">Company name</label>
                                        <input type="text" class="form-control " id="company_name" name="company_name" value="" placeholder="" required>
                                    </div>
                                    <div class="line line-dashed b-b line-lg"></div>
                                    <div class="form-group">
                                        <label for="field-reply-to">Slug</label>
                                        <input type="text" class="form-control " id="slug" name="slug" value="" placeholder="" required>
                                    </div>
                                    <div class="line line-dashed b-b line-lg"></div>
                                    <input type="submit" class="btn" value="create">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        </form>
        <!-- /hbox layout  -->
    </div>
    <script>
        $('#company_name').keyup(function () {
            $('#slug').val(string_to_slug($('#company_name').val()));
        });
        var string_to_slug = function (str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";

            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    </script>
@stop
