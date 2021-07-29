<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PTE</title>
  <style>
    /* @font-face {
      font-family: SourceSansPro;
      src: url("{{ asset('assets/fonts/SourceSansPro-Regular.ttf') }}");
    } */

    html {
      /* font-family: SourceSansPro; */
      font-size: 14px;
      width: 100%;
      margin: 0;
      padding: 0;
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

<body style="">
  <header style="height: 100px; width: 100%;background-color: #d4ebe2;overflow: hidden;">
    <div id="logo" style="display: inline-block;width: 100%; padding: 10px 30px;">
        @php
        $logo = base64_encode(file_get_contents(public_path('assets/images/logo.png')));
        @endphp
      <img src="data:image/png;base64,{{ $logo }}" style="float: left;height: 70px;">
      <div style="float: left;margin-left: 10px;">
        <h1 style="margin-bottom: 10px;">Pearson | PTE Academix | Score Report</h1>
        <span><strong>Score Report Code :</strong> 2131312jds83</span>
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
  <main style="padding: 25px 30px;background-color: #fff;display: block;">
    <div id="details" class="clearfix">
      <div id="client" style="width: 68%;display: inline-block;border-right:2px solid #e8e8e8;">
        @php
        $profile = base64_encode(file_get_contents(public_path('assets/images/girl.png')));
        @endphp
        <img src="data:image/png;base64,{{ $profile }}" style="float: left;margin-right: 20px;">
        <h2 style="margin-top: 0;margin-bottom: 10px;">John Doe</h2>
        <div><strong>Test Taker ID:</strong>21241b3b4</div>
        <div><strong>Registration ID:</strong>21123123</div>
      </div>
      <div id="invoice" style="width: 30%;float: right;text-align: center;">
        <div style="display: block;width: 110px;margin: 0 auto;">
          <span style="display: inline-block;background-color: #0d546c;color: #fff;  border-top-left-radius: 10px; border-top-right-radius: 10px;font-size: 16px;padding: 3px 8px;margin-bottom: 0;">Overall Score</span>
          <span style="display: block;background-color: #a0007e;color: #fff; padding: 0px 30px 20px 25px; font-size: 50px;border-bottom-right-radius: 60px; border-bottom-left-radius: 60px;">56</span>
        </div>
      </div>
    </div>

    <div style="margin-top: 20px;">
      <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;margin-bottom: 20px;">Communicative Skills</h2>
      <div style="text-align: center;">
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #243455; padding: 20px;display: block;  border-radius: 40px; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">57</span>
          <span>Listening</span>
        </div>
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #c3cf24; padding: 20px;display: block;  border-radius: 40px; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">57</span>
          <span>Reading</span>
        </div>
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #5b5b5b; padding: 20px;display: block;  border-radius: 40px; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">57</span>
          <span>Speaking</span>
        </div>
        <div style="width: 85px; text-align: center;display: inline-block;margin: 0px 15px;">
          <span style="border: 4px solid #910c68; padding: 20px;display: block;  border-radius: 40px; font-size: 24px;
            width: 36px;font-weight: 700;height: 36px;margin-bottom: 8px;">57</span>
          <span>Writing</span>
        </div>
      </div>
    </div>

    <div class="line-block" style="width: 100%;display: inline-block;background-color: #fff;">
      <div style="width: 55%;float: left;">
        <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;">Skills Breakdown</h2>

        <div style="margin-top: 40px;">
          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Listening</span>
            <span style="padding: 0px 7px;font-size: 16px;">20</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #143158;width: 20%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Reading</span>
            <span style="padding: 0px 7px;font-size: 16px;">80</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #d2dd05;width: 80%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Speaking</span>
            <span style="padding: 0px 7px;font-size: 16px;">66</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #5a5959;width: 66%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Writing</span>
            <span style="padding: 0px 7px;font-size: 16px;">45</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #9a017c;width: 45%;  height: 18px; display: block;"></span></span>
          </div>

          <h4>Enabling Skills</h4>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Grammer</span>
            <span style="padding: 0px 7px;font-size: 16px;">46</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: 46%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Oral Fluency</span>
            <span style="padding: 0px 7px;font-size: 16px;">53</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: 53%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Pronunciation</span>
            <span style="padding: 0px 7px;font-size: 16px;">25</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: 25%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Spealling</span>
            <span style="padding: 0px 7px;font-size: 16px;">75</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: 75%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Vocabulary</span>
            <span style="padding: 0px 7px;font-size: 16px;">70</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: 70%;  height: 18px; display: block;"></span></span>
          </div>

          <div style="width: 100%;margin-bottom: 4px;">
            <span style="width: 30%;display: inline-block; text-align: right;color: #7d7d7d;">Written Discourse</span>
            <span style="padding: 0px 7px;font-size: 16px;">85</span>
            <span class="line" style="width: 60%;display: inline-block;height: 18px;vertical-align: middle;"><span style="background-color: #2fbeb4;width: 85%;  height: 18px; display: block;"></span></span>
          </div>
        </div>

      </div>
      <div style="width: 40%;float: right;">
        <div style="margin-bottom: 60px;">
          <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;">Test Centre Information</h2>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Date :</strong> 30 Jun 2021</div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Valid Until :</strong> 30 June 2022
          </div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Centre Country :</strong> India
          </div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Centre ID :</strong> 82882</div>
          <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Test Centre :</strong> Kangaroo
            Studies Pvt. Ltd.</div>
        </div>

        <h2 style="border-bottom:2px solid #e8e8e8;margin-top: 30px;padding-bottom: 7px;">Candidate Information</h2>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Date of Birth :</strong> 06 Mat 2021</div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Country of Citizenship :</strong> India
        </div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Country of Residence :</strong> India
        </div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Gender :</strong> Female</div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>Email :</strong> twinkle123@gmail.com</div>
        <div style="margin-bottom: 8px;font-size: 16px;color: #3c3c3c;"><strong>First-Time Test Taker :</strong> Yes
      </div>
    </div>
  </main>
  <footer style="height: 50px;background-color: #d4ebe2;display: block;">
  </footer>
</body>

</html>

  <!--<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 4px;
    }
</style>
<div style="padding: 20px;">
    <h2>Test Result for {{ $data->test->test_name }}</h2>
    <h3>Student Name: {{ $data->student->name }}</h3>
    <table>
        <thead>
            <tr>
                <th>Skills</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Reading</td>
                <td>{{ $data->reading }}</td>
            </tr>
            <tr>
                <td>Listening</td>
                <td>{{ $data->listening }}</td>
            </tr>
            <tr>
                <td>Writing</td>
                <td>{{ $data->writing }}</td>
            </tr>
            <tr>
                <td>Speaking</td>
                <td>{{ $data->speaking }}</td>
            </tr>
            <tr>
                <td>Grammar</td>
                <td>{{ $data->grammar }}</td>
            </tr>
            <tr>
                <td>Oral Fluency</td>
                <td>{{ $data->oral_fluency }}</td>
            </tr>
            <tr>
                <td>Pronunciation</td>
                <td>{{ $data->pronunciation }}</td>
            </tr>
            <tr>
                <td>Spelling</td>
                <td>{{ $data->spelling }}</td>
            </tr>
            <tr>
                <td>Vocabulary</td>
                <td>{{ $data->vocabulary }}</td>
            </tr>
            <tr>
                <td>Written Discourse</td>
                <td>{{ $data->written_discourse }}</td>
            </tr>
            <tr>
                <td>Overall Score</td>
                <td>{{ $data->score }}</td>
            </tr>
        </tbody>
    </table>
</div>
-->