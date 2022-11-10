<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  
<div id="file-js-example" class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="file-input" type="file" name="nama_file" id="nama_file">

                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </span>
                                <span class="file-label">
                                    Choose a file…
                                </span>
                            </span>
                            <span class="file-name">No file uploaded</span>
                        </label>

                    </div>
<!-- <div id="file-js-example" class="file has-name">
  <label class="file-label">
    <input class="file-input" type="file" name="resume">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
    <span class="file-name">
      No file uploaded
    </span>
  </label>
</div> -->

<script>
  const fileInput = document.querySelector('#file-js-example input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-example .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>