<form class="form mt-4 ml-3" enctype="multipart/form-data" id="editPrediction">
@csrf
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Prediction Title</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="title" placeholder="Enter Prediction Title" value="{{ $prediction->title }}">
        <span class="error-msg" id="titleError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Prediction Description</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="description" placeholder="Enter Prediction Description" value="{{ $prediction->description }}">
        <span class="error-msg" id="descriptionError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Prediction File</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
      <div class="custom-file">
        <input type="file" class="custom-file-input" name="file" id="customFile">
        <label class="custom-file-label" for="customFile">Please Upload Prediction File</label>
        <span class="info">
          <small><i>Please upload the file only if you want to change the document for this prediction.</i>
          <br><a href="{{ url('/'.$prediction->link) }}">Click Here</a> to check Current Document</span></small>
        </span><br>
        <span class="error-msg" id="fileError"></span>
      </div>
    </div>
</div>
<div class="form-group row">
  <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Prediction Section</label>
  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
    <select id="sections" name="section_id"  class="form-select">
      <option value="" selected>Select Section</option>
      @if(count($sections) > 0)
        @foreach($sections as $section)
          <option value="{{ $section->id }}" {{ ($prediction->section_id == $section->id)?'selected':''}}>{{ ucfirst($section->section_name) }}</option>
        @endforeach
      @endif
    </select>
    <span class="error-msg" id="sectionError"></span>
  </div>
</div>
<div class="form-group row">
  <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Prediction Type</label>
  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
    <select id="types" name="design_id" class="form-select" data-json="{{ json_encode($types) }}">
      <option value="" selected>Select Type</option>
      @if(count($types[$prediction->section_id]) > 0)
        @foreach($types[$prediction->section_id] as $type)
          <option value="{{ $type['id'] }}" {{ ($prediction->design_id == $type['id'])?'selected':''}}>{{ ucfirst($type['name']) }}</option>
        @endforeach
      @endif
    </select>
    <span class="error-msg" id="typeError"></span>
  </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
        <input type="checkbox" id="video" name="status" value="E" {{ ($prediction->status == 'E')?'checked':''}} /><label for="video">Status</label>
        <span class="error-msg" id="statusError"></span>
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
        <button type="submit" class="btn btn-outline-primary file-update" data-id="{{ $prediction->id }}" data-url="{{ route('branchadmin-predictionfiles-update', $prediction->id) }}">
            <i class="far fa-save save-icon"></i>Save</button>
    </div>
</div>
</form>