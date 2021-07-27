<style>
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