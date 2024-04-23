@extends('layouts.admin')



@section('content')
    <div class="container">
        <h2 class="mt-5">Application Form</h2>
        <form action="submit.php" method="POST">
            <div class="mb-3">
                <label for="bcode" class="form-label">Bcode:</label>
                <input type="text" class="form-control" id="bcode" name="bcode">
            </div>

            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>

            <div class="mb-3">
                <label for="pnumber" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="pnumber" name="pnumber">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <input type="text" class="form-control" id="gender" name="gender">
            </div>

            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday:</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
            </div>

            <div class="mb-3">
                <label for="height" class="form-label">Height:</label>
                <input type="text" class="form-control" id="height" name="height">
            </div>

            <div class="mb-3">
                <label for="resume" class="form-label">Resume:</label>
                <input type="text" class="form-control" id="resume" name="resume">
            </div>

            <div class="mb-3">
                <label for="objectives" class="form-label">Objectives:</label>
                <textarea class="form-control" id="objectives" name="objectives"></textarea>
            </div>

            <div class="mb-3">
                <label for="idpic" class="form-label">ID Picture:</label>
                <input type="text" class="form-control" id="idpic" name="idpic">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <input type="number" class="form-control" id="status" name="status">
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Class:</label>
                <input type="text" class="form-control" id="class" name="class">
            </div>

            <div class="mb-3">
                <label for="scomment" class="form-label">Special Comments:</label>
                <input type="text" class="form-control" id="scomment" name="scomment">
            </div>

            <div class="mb-3">
                <label for="contact_person" class="form-label">Contact Person:</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person">
            </div>

            <div class="mb-3">
                <label for="religion" class="form-label">Religion:</label>
                <input type="text" class="form-control" id="religion" name="religion">
            </div>

            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Place of Birth:</label>
                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Weight:</label>
                <input type="text" class="form-control" id="weight" name="weight">
            </div>

            <div class="mb-3">
                <label for="blood_type" class="form-label">Blood Type:</label>
                <input type="text" class="form-control" id="blood_type" name="blood_type">
            </div>

            <div class="mb-3">
                <label for="pcountry" class="form-label">Country:</label>
                <input type="text" class="form-control" id="pcountry" name="pcountry">
            </div>

            <div class="mb-3">
                <label for="msalary" class="form-label">Monthly Salary:</label>
                <input type="text" class="form-control" id="msalary" name="msalary">
            </div>

            <div class="mb-3">
                <label for="first_or_ex" class="form-label">First or Experienced:</label>
                <input type="text" class="form-control" id="first_or_ex" name="first_or_ex">
            </div>

            <div class="mb-3">
                <label for="ex_agency" class="form-label">Previous Agency:</label>
                <input type="text" class="form-control" id="ex_agency" name="ex_agency">
            </div>

            <div class="mb-3">
                <label for="position_applied" class="form-label">Position Applied:</label>
                <input type="text" class="form-control" id="position_applied" name="position_applied">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
