<script type="text/javascript">

    $('#tag_list').select2({
        placeholder : 'Choose some tags',
        tags : true
    });

    function getPostBody() {
        document.getElementById("post-body-value").value =
            document.getElementById("out").innerHTML;
    }

    var URL = window.URL || window.webkitURL || window.mozURL || window.msURL;
    navigator.saveBlob = navigator.saveBlob || navigator.msSaveBlob || navigator.mozSaveBlob || navigator.webkitSaveBlob;
    window.saveAs = window.saveAs || window.webkitSaveAs || window.mozSaveAs || window.msSaveAs;


    // Because highlight.js is a bit awkward at times
    var languageOverrides = {
        js: 'javascript',
        html: 'xml'
    };
    emojify.setConfig({
        img_dir: 'emoji'
    });
    var md = markdownit({
        highlight: function(code, lang){
            if(languageOverrides[lang]) lang = languageOverrides[lang];
            if(lang && hljs.getLanguage(lang)){
                try {
                    return hljs.highlight(lang, code).value;
                }catch(e){}
            }
            return '';
        }
    })
        .use(markdownitFootnote);

    var md = markdownit({
        html: true,
        linkify: true,
        typography: true
    }).use(markdownitVideo);

    function update(e){
        setOutput(e.getValue());
        clearTimeout(hashto);
        hashto = setTimeout(updateHash, 1000);
    }
    function setOutput(val){
        val = val.replace(/<equation>((.*?\n)*?.*?)<\/equation>/ig, function(a, b){
            return '<img src="http://latex.codecogs.com/png.latex?' + encodeURIComponent(b) + '" />';
        });
        var out = document.getElementById('out');
        var old = out.cloneNode(true);
        out.innerHTML = md.render(val);
        emojify.run(out);
        var allold = old.getElementsByTagName("*");
        if (allold === undefined) {
            return;
        }
        var allnew = out.getElementsByTagName("*");
        if (allnew === undefined) {
            return;
        }
        for (var i = 0, max = Math.min(allold.length, allnew.length); i < max; i++) {
            if (!allold[i].isEqualNode(allnew[i])) {
                out.scrollTop = allnew[i].offsetTop;
                return;
            }
        }
    }
    var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
        mode: 'gfm',
        lineNumbers: false,
        matchBrackets: true,
        lineWrapping: true,
        theme: 'base16-light',
        extraKeys: {"Enter": "newlineAndIndentContinueMarkdownList"}
    });
    editor.on('change', update);
    document.addEventListener('drop', function(e){
        e.preventDefault();
        e.stopPropagation();
        var theFile = e.dataTransfer.files[0];
        var theReader = new FileReader();
        theReader.onload = function(e){
            editor.setValue(e.target.result);
        };
        theReader.readAsText(theFile);
    }, false);
    function saveAsMarkdown(){
        var code = editor.getValue();
        var blob = new Blob([code], { type: 'text/plain' });
        saveBlob(blob, "untitled.md");
    }
    document.getElementById('saveas-markdown').addEventListener('click', function() {
        saveAsMarkdown();
        hideMenu();
        return false;
    });
    function saveAsHtml() {
        var code = document.getElementById('out').innerHTML;
        var blob = new Blob([code], { type: 'text/plain' });
        saveBlob(blob, "untitled.html");
    }
    document.getElementById('saveas-html').addEventListener('click', function() {
        saveAsHtml();
        hideMenu();
        return false;
    });
    function saveBlob(blob, name){
        if(window.saveAs){
            window.saveAs(blob, name);
        }else if(navigator.saveBlob){
            navigator.saveBlob(blob, name);
        }else{
            url = URL.createObjectURL(blob);
            var link = document.createElement("a");
            link.setAttribute("href",url);
            link.setAttribute("download",name);
            var event = document.createEvent('MouseEvents');
            event.initMouseEvent('click', true, true, window, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
            link.dispatchEvent(event);
        }
    }
    function showMenu() {
        document.getElementById('menu').style.display = 'block';
    }
    function hideMenu() {
        document.getElementById('menu').style.display = 'none';
    }
    hideMenu();
    document.addEventListener('keydown', function(e){
        if(e.keyCode == 83 && (e.ctrlKey || e.metaKey)){
            e.preventDefault();
            showMenu();
            return false;
        }
    });
    var hashto;
    function updateHash(){
        window.location.hash = btoa( // base64 so url-safe
            RawDeflate.deflate( // gzip
                unescape(encodeURIComponent( // convert to utf8
                    editor.getValue()
                ))
            )
        );
    }
    if(window.location.hash){
        var h = window.location.hash.replace(/^#/, '');
        if(h.slice(0,5) == 'view:'){
            setOutput(decodeURIComponent(escape(RawDeflate.inflate(atob(h.slice(5))))));
            document.body.className = 'view';
        }else{
            editor.setValue(
                decodeURIComponent(escape(
                    RawDeflate.inflate(
                        atob(
                            h
                        )
                    )
                ))
            );
            update(editor);
            editor.focus();
        }
    }else{
        update(editor);
        editor.focus();
    }



</script>
