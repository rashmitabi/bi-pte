<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PTE</title>
  <style>
    @font-face {
      font-family: SourceSansPro;
      src: url("{{ asset('assets/fonts/SourceSansPro-Regular.ttf') }}");
    }

    body {
      font-family: SourceSansPro;
    }

    .line{
      position: relative;
    }
    .line:after{
      position: absolute;
      content: '';
      background-color: #8594aa;
      height: 75px;
      width: 4px;
      left: 70%;
      z-index: 1;
      top: -13px;
    }
    .line-block .line:first-child():before{
      position: absolute;
      content: 'Hey';
      top: -13px;
      left: 70%;
    }
  </style>
</head>

<body style="width: 21cm; margin: 0 auto; background: #000000;font-size: 14px;">
  <header style="height: 100px; width: 100%;background-color: #d4ebe2;overflow: hidden;">
    <div id="logo" style="display: inline-block;width: 100%; padding: 10px 30px;">
        @if(isset($data['institute']->institue->logo) && $data['institute']->institue->logo != '' && $data['institute']->institue->logo != NULL)
          @php
          $logo = base64_encode(file_get_contents(public_path('assets/images/institute/'.$data['institute']->institue->logo)));
          @endphp
        @else
          @php
          $logo = base64_encode(file_get_contents(public_path('assets/images/logo.png')));
          @endphp
        @endif
      <img src="data:image/png;base64,{{ $logo }}" style="float: left;height: 70px;">
      <div style="float: left;margin-left: 10px;">
        <h1 style="margin-bottom: 10px;">{{$data['institute']->institue->institute_name}} | PTE Academix | Score Report</h1>
        <span><strong>Score Report Code :</strong> {{ $data['certificate']->id }}</span>
      </div>
    </div>
    <!-- <div id="company">
        <h2 class="name">Company Name</h2>
        <div>455 Foggy Heights, AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div> -->
    </div>
  </header>
  <main style="padding: 25px 30px;background-color: #fff;">
    <div id="details" class="clearfix">
      <div id="client" style="width: 68%;display: inline-block;border-right:2px solid #e8e8e8;">
        @if(isset($data['certificate']->student->profile_image) && $data['certificate']->student->profile_image != '' && $data['certificate']->student->profile_image != NULL)
          @php
          $profile = base64_encode(file_get_contents(public_path('assets/images/profile/'.$data['certificate']->student->profile_image)));
          @endphp
        @else
          @php
          $profile = base64_encode(file_get_contents(public_path('assets/images/profile/default.png')));
          @endphp
        @endif
        <img src="data:image/png;base64,{{ $profile }}" style="float: left;margin-right: 20px; height:100px;">
        <h2 style="margin-top: 0;margin-bottom: 10px;">
          {{ $data['certificate']->student->first_name }} {{ $data['certificate']->student->last_name }}
        </h2>
        <div><strong>Test Taker ID:</strong>{{ $data['certificate']->student->id }}</div>
        <div><strong>Registration ID:</strong>{{ $data['certificate']->student->id }}</div>
      </div>
      <div id="invoice" style="width: 30%;float: right;text-align: center;">
        <div style="display: grid;width: 110px;margin: 0 auto;">
          <span
            style="background-color: #0d546c;color: #fff;  border-top-left-radius: 10px; border-top-right-radius: 10px;font-size: 16px;padding: 3px 8px;">Overall
            Score</span>
          <span
            style="background-color: #a0007e;color: #fff; padding: 5px 5px 15px 5px; font-size: 50px;border-bottom-right-radius: 60px; border-bottom-left-radius: 60px;">{{ $data['certificate']->score }}</span>
        </div>
      </div>
    </div>

    <div>
      <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;">Communicative Skills</h2>
      <div style="text-align: center;">
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #243455; padding: 20px;display: block;  border-radius: 100%; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">{{ $data['certificate']->listening }}</span>
          <span>Listening</span>
        </div>
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #c3cf24; padding: 20px;display: block;  border-radius: 100%; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">{{ $data['certificate']->reading }}</span>
          <span>Reading</span>
        </div>
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #5b5b5b; padding: 20px;display: block;  border-radius: 100%; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">{{ $data['certificate']->speaking }}</span>
          <span>Speaking</span>
        </div>
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #910c68; padding: 20px;display: block;  border-radius: 100%; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">{{ $data['certificate']->writing }}</span>
          <span>Writing</span>
        </div>
      </div>
    </div>

    <div class="line-block" style="width: 100%;display: inline-block;">
      <div style="width: 55%;float: left;">
        <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;">Skills Breakdown</h2>

        <div style="margin-top: 40px;">
          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Listening</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->listening }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #143158;width: {{ $data['certificate']->listening * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Reading</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->reading }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #d2dd05;width: {{ $data['certificate']->reading * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Speaking</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->speaking }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #5a5959;width: {{ $data['certificate']->speaking * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Writing</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->writing }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #9a017c;width: {{ $data['certificate']->writing * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <h4>Enabling Skills</h4>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Grammer</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->grammar }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: {{ $data['certificate']->grammar * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Oral Fluency</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->oral_fluency }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: {{ $data['certificate']->oral_fluency * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Pronunciation</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->pronunciation }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: {{ $data['certificate']->pronunciation * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Spelling</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->spelling }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: {{ $data['certificate']->spelling * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Vocabulary</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->vocabulary }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: {{ $data['certificate']->vocabulary * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Written Discourse</span>
            <span style="padding: 0px 7px;font-size: 16px;">{{ $data['certificate']->written_discourse }}</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: {{ $data['certificate']->written_discourse * 100/90 }}%;  height: 18px; display: block;"></span></span>
          </div>
        </div>

      </div>
      <div style="width: 40%;float: right;">
        <div style="margin-bottom: 60px;">
          <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;">Test Centre Information</h2>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Date :</strong> {{ date('d M Y', strtotime($data['student_test']->end_date)) }}</div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Valid Until :</strong> {{ date("d M Y", strtotime(date("Y-m-d", strtotime($data['student_test']->end_date)) . " + 1 year")) }}
          </div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Centre Country :</strong> {{ $data['institute']->country_citizen }}
          </div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Centre ID :</strong> {{ $data['institute']->id }}</div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Centre :</strong> {{$data['institute']->institue->institute_name}}</div>
        </div>

        <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;">Candidate Information</h2>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Date of Birth :</strong> {{ date('d M Y', strtotime($data['certificate']->student->date_of_birth)) }}</div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Country of Citizenship :</strong> {{ $data['certificate']->student->country_citizen }}
        </div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Country of Residence :</strong> {{ $data['certificate']->student->country_residence }}
        </div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Gender :</strong> 
          @if ($data['certificate']->student->gender == "F")
            Female
          @else
            Male
          @endif
        </div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Email :</strong> {{ $data['certificate']->student->email }}</div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>First-Time Test Taker :</strong> 
      </div>
    </div>
  </main>
  <footer style="height: 50px;background-color: #d4ebe2;display: block;">
  </footer>
</body>

</html>
