<!doctype html>
<html lang="sk">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume</title>
</head>
<style>
   /* @font-face {
        font-family: 'DejaVuSans';
        src: url({{ asset('fonts/DejaVuSans.ttf') }});
        font-style: normal;
        font-weight: normal;
    }*/


    body {
        font-family: Verdana;
        font-weight: normal;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1024px;
        margin: 0 auto;
        padding: .5rem 2rem;
    }

    .user-info {
        margin-top: 3rem;
        margin-bottom: 3rem;
    }
    .user-info p {
        margin-bottom: .3rem;

    }

    .full-name {
        color: #175f73;
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .user-works,
    .user-education,
    .user-courses,
    .user-skills,
    .user-languages,
    .user-hobby {
        margin-bottom: 3rem;
    }

    h3 {
        color: #175f73;
        border-bottom: 2px solid #175f73;
        padding-bottom: .3rem;
        text-transform: uppercase;
    }

    h4 {
        margin-bottom: .3rem;
        margin-top: 1rem;


    }

    .user-works p,
    .user-education p,
    .user-courses p,
    .user-skills p,
    .user-languages p,
    .user-hobby p {
        margin-bottom: .2rem;
        font-size: .8rem;

    }

    .user-skills p,
    .user-languages p,
    .user-hobby p {
        margin-top: .5rem;
    }

    small {
        font-size: 80%;
    }

    strong {
        display: flex;
    }

</style>
<body class="container">

        <section class="user-info">
            @if($user->userDetail)
                <h1 class="full-name">
                    {{$user->userDetail->fullName}}
                </h1>
                <p><strong>Adresa:</strong> {{$user->userDetail->fullAddress}} </p>
                <p><strong>Tel.:</strong> {{$user->userDetail->phone}} </p>
                <p><strong>Email:</strong> {{$user->email}} </p>
                <p><strong>Dátum narodenia:</strong> {{ date("j. n. Y",  strtotime($user->userDetail->birthdate) ) }} </p>
             @endif
        </section>

        @if(isset($user->works))
            <section class="user-works">
                @foreach($user->works as $work)
                        @if ($loop->first)
                            <h3>Pracovné skúsenosti</h3>
                        @endif
                    <h4> {{$work->employer}}</h4>
                    <p> {{$work->job_title}}  </p>
                    <p>
                        {{$work->StartFormatDate}} -
                        @if($work->EndFormatDate == 1970)
                            Doteraz,
                        @else
                            {{$work->EndFormatDate}},
                        @endif
                        {{$work->city}}
                    </p>
                    <p>
                        @if($work->description)
                            <small>{!! nl2br($work->description) !!}</small>
                        @endif
                    </p>
                @endforeach
            </section>
        @endif

        @if(isset($user->education))
            <section class="user-education">
                    @foreach($user->education as $education)
                    @if ($loop->first)
                        <h3>Vzdelanie</h3>
                    @endif
                        <h4> {{$education->school_name}}</h4>
                        <p> {{$education->field_of_study}} </p>
                        <p> {{$education->FullFormatDate}}, {{$education->city}} </p>
                    @endforeach
            </section>
        @endif

        @if(isset($user->courses))
            <section class="user-courses">

                @foreach($user->courses as $course)
                    @if($loop->first)
                        <h3>Kurz alebo certifikát </h3>
                    @endif
                    <h4>{{$course->institution}}</h4>
                    <p>{{$course->title}}, {{$course->FullFormatDate}}</p>
                    <p>{{$course->description}}</p>
                @endforeach
            </section>
        @endif

        @if(isset($user->skills))
            <section class="user-skills">

                    @foreach($user->skills as $skill)
                        @if($loop->first)
                            <h3>Znalosti </h3>
                        @endif
                        <p> <strong>{{$skill->name}}</strong>  - {{$skill->level->name}}</p>
                    @endforeach
            </section>
        @endif

        @if(isset($user->languages))
            <section class="user-languages">
                @foreach($user->languages as $language)
                    @if($loop->first)
                        <h3>Jazyky </h3>
                    @endif
                    <p> <strong>{{$language->language}}</strong>  - {{$language->languageLevel->name}}</p>
                @endforeach
            </section>
        @endif

        @if( isset($user->userDetail->drivingLicenses) )
            <section class="user-languages">
                @foreach($user->userDetail->drivingLicenses as $license)
                    @if($loop->first)
                        <h3>Vodičský preukaz </h3>
                    @endif
                    <p class="groups"> <strong>{{$license->group}} </strong> </p>
                @endforeach
            </section>
        @endif

        @if(isset($user->hobby))
            <section class="user-hobby">
                @if($user->hobby != '')
                    <h3>Záujmy alebo koníčky</h3>
                @endif
                    <p> {{$user->hobby->text}}  </p>
            </section>
        @endif


</body>
</html>
