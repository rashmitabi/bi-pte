<form class="form mt-4 ml-3" method="post" action="">
@csrf
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Title</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="title" placeholder="Enter Video Title" value="{{ $video->title }}">
        <span class="error-msg" id="titleError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Description</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="description" placeholder="Enter Video Description" value="{{ $video->description }}">
        <span class="error-msg" id="descriptionError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Link</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="link" placeholder="Enter Video Link" value="{{ $video->link }}">
        <span class="error-msg" id="linkError"></span>
    </div>
</div>
<div class="form-group row">
  <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Video Section</label>
  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
    <select id="sections" name="section_id"  class="form-select">
      <option value="" selected>Select Section</option>
      @if(count($sections) > 0)
        @foreach($sections as $section)
          <option value="{{ $section->id }}" {{ ($video->section_id == $section->id)?'selected':''}}>{{ ucfirst($section->section_name) }}</option>
        @endforeach
      @endif
    </select>
    <span class="error-msg" id="sectionError"></span>
  </div>
</div>
<div class="form-group row">
  <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label">Video Type</label>
  <div class="col-12 col-md-7 col-xl-7 col-sm-12">
    <select id="types" name="design_id" class="form-select" data-json="{{ json_encode($types) }}">
      <option value="" selected>Select Type</option>
      @if(count($types[$video->section_id]) > 0)
        @foreach($types[$video->section_id] as $type)
          <option value="{{ $type['id'] }}" {{ ($video->design_id == $type['id'])?'selected':''}}>{{ ucfirst($type['name']) }}</option>
        @endforeach
      @endif
    </select>
    <span class="error-msg" id="typeError"></span>
  </div>
</div>
<div class="form-group row">
    <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
        <button type="button" class="btn btn-outline-primary video-update" data-id="{{ $video->id }}" data-url="{{ route('videos.update', $video->id) }}">
            <i class="far fa-save save-icon"></i>Save</button>
    </div>
</div>
</form>