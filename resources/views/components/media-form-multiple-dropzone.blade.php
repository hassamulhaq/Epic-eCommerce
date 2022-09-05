<div id="MultiMediaDropzoneModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    {{ $header_title ?? 'Upload Media/s' }}
                </h3>
                <h6 class="pl-2.5 font-normal text-gray-900 dark:text-white">
                    {{ $no_of_images ?? '' }}
                </h6>
                <button type="button" data-modal-toggle="MultiMediaDropzoneModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="{{ route('admin.upload-media') }}" method="post" id="media_form_multiple_dropzone" class="dropzone" enctype="multipart/form-data">
                    @csrf
                </form>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">

            </div>
        </div>
    </div>
</div>

{{ $slot }}

{{--

How to trigger this modal
<button type="button" data-modal-toggle="MultiMediaDropzoneModal" class="text-sm px-5 py-2.5 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
    Upload Gallery
</button>

--}}

@push('before_body')
    <link rel="stylesheet" href="{{ asset("/plugins/dropzone@6.0.0-beta.2/dropzone.css") }}">
    <script src="{{ asset("plugins/dropzone@6.0.0-beta.2/dropzone-min.js") }}"></script>
@endpush

<script type="text/javascript">
    const uploadedDocumentMap = {};
    Dropzone.options.documentDropzone = {
        url: '{{ route('admin.upload-media') }}',
        paramName: "file",
        maxFilesize: 2, // MB
        maxFiles: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (file, response) {
            file.previewElement.id = response.success;
            console.log(file);
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="' + name + '"]').remove()
        },
        init: function () {
            alert('op')
{{--            @if(isset($project) && $project->document)--}}
{{--            var files = {!! json_encode($project->document) !!}--}}
{{--                for (var i in files) {--}}
{{--                    var file = files[i]--}}
{{--                    this.options.addedfile.call(this, file)--}}
{{--                    file.previewElement.classList.add('dz-complete')--}}
{{--                $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')--}}
{{--            }--}}
{{--            @endif--}}
        }
    }

    Dropzone.discover();
</script>
