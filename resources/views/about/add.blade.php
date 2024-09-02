@extends('layouts/contentLayoutMaster')
  <link rel="stylesheet" href="{{ asset('dist/css/lightbox.min.css') }}">
<script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
@section('title', 'about-us')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<style>
    label {
        font-size: 15px !important;
        font-weight: bold;

    }

</style>

<!-- Basic multiple Column Form section start -->

<section id="basic-vertical-layouts">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header ">
                    <h1 class="card-title" style="font-size:27px;">Add About-us</h1>      
                </div>
                <hr class="bold-line">
                <div class="card-body">
                    <form class="form form-vertical" role="form" action="{{route('about-us-save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="contact-info-vertical">Title  <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="title" placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Feature Image  <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
                                    <input type="file" id="coupon-value-vertical" class="form-control" name="fe_image" placeholder="Coupon Value" required>
                                </div>
                            </div>
                            <div class="col-12">
								<div class="mb-1">
								  <label class="form-label" for="password-vertical">Short Discription <b style="color:red; font-size: 18px;font-weight:bold;">*</b></label>
								  <textarea class="form-control"name="short_discription" id="short_discription" required></textarea>
								</div>
							  </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-vertical">Discription </label>
                                    <div class="editor-controls" id="editor-controls">
                                        <div class="rte editor button-group" id="fontFamilyGroup">
                                            <div class="rte editor dropdown-label"><i class="fa fa-fw fa-font"></i></div>
                                            <select class="rte dropdown editor" id="fontFamily" title="Font Family"><i class="fa fa-fw fa-font"></i>
                                                <option value="Arial, Helvetica, sans-serif" style="font-family: Arial, Helvetica, sans-serif">Arial</option>
                                                <option value="'Arial Black', Gadget, sans-serif" style="font-family: 'Arial Black', Gadget, sans-serif">Arial Black</option>
                                                <option value="'Times New Roman', serif" style="font-family: 'Times New Roman">Times New Roman</option>
                                                <option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif" style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif">Book Antiqua</option>
                                                <option value="Impact, Charcoal, sans-serif" , style="font-family: Impact, Charcoal, sans-serif">Impact</option>
                                                <option value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif" style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida Console</option>
                                                <option value="Tahoma, Geneva, sans-serif" style="font-family: Tahoma, Geneva, sans-serif">Tahoma</option>
                                                <option value="'Trebuchet MS', Helvetica, sans-serif" style="font-family: 'Trebuchet MS', Helvetica, sans-serif">Trebuchet MS</option>
                                                <option value="Verdana, Geneva, sans-serif" style="font-family: Verdana, Geneva, sans-serif">Verdana</option>
                                            </select>
                                        </div>
                                        <div class="rte editor button-group" id="parStyleGroup">
                                            <div class="rte editor dropdown-label"><i class="fa fa-fw fa-header"></i></div>
                                            <select class="rte dropdown editor" id="parStyle" title="Paragraph Style"><i class="fa fa-fw fa-font"></i>
                                                <option value="h1" style="font-size: 2em; font-style: bold;" id="heading1">Heading 1</option>
                                                <option value="h2" style="font-size: 1.75em; font-style: bold;" id="heading2">Heading 2</option>
                                                <option value="h3" style="font-size: 1.5em; font-style: bold;">Heading 3</option>
                                                <option value="h4" style="font-size: 1.25em; font-weight: 900;">Heading 4</option>
                                                <option value="h5" style="font-size: 1.15em; font-weight: bold;">Heading 5</option>
                                                <option value="h5" style="font-size: 1.15em; font-weight: bold;">Heading 6</option>
                                                <option selected value="p" style="font-size: 1.0em; font-weight: bold;">Paragraph</option>
                                            </select>
                                        </div>

                                        <div class="rte editor button-group" id="textSizeGroup">
                                            <div class="rte editor dropdown-label" style="height: 30px;"><i class="fa fa-fw fa-text-height"></i></div>
                                            <select class="rte dropdown editor" id="fontSize" title="Font Size" onclick=""><i class="fa fa-fw fa-font"></i>
                                                <option value="1" size="1">1</option>
                                                <option value="2" size="2">2</option>
                                                <option value="3" size="3">3</option>
                                                <option value="4" size="4">4</option>
                                                <option value="5" size="5">5</option>
                                                <option value="6" size="6">6</option>
                                                <option value="7" size="7">7</option>
                                            </select>
                                        </div>

                                        <div class="rte editor button-group" id="textColorGroup">
                                            <div class="rte editor dropdown-label" style="height: 30px;"><i class="fa fa-fw fa-pencil"></i></div>
                                            <select class="rte dropdown editor" id="textColor" title="Text Color" onclick=""><i class="fa fa-fw fa-font"></i>
                                                <option value="#eb2538" data-textcolor="white" style="background-color: #eb2538; color: white;">Scarlet</option>
                                                <option value="#be1e2d" data-textcolor="white" style="background-color: #be1e2d; color: white;">Crimson</option>
                                                <option value="#eb25a2" data-textcolor="black" style="background-color: #eb25a2; color: black;">Hot Pink</option>
                                                <option value="#be1e9e" data-textcolor="black" style="background-color: #be1e9e; color: black;">Violet</option>
                                                <option value="#781363" data-textcolor="white" style="background-color: #781363; color: white;">Plumb</option>
                                                <option value="#5a25eb" data-textcolor="white" style="background-color: #5a25eb; color: white;">Indigo</option>
                                                <option value="#491ebe" data-textcolor="white" style="background-color: #491ebe; color: white;">Royal Blue</option>
                                                <option value="#2e1378" data-textcolor="white" style="background-color: #2e1378; color: white;">Navy</option>
                                                <option value="#25aceb" data-textcolor="black" style="background-color: #25aceb; color: black;">Sky</option>
                                                <option value="#1e79be" data-textcolor="white" style="background-color: #1e79be; color: white;">Aqua</option>
                                                <option value="#135178" data-textcolor="white" style="background-color: #135178; color: white;">Deep Sea</option>
                                                <option value="#25eb64" data-textcolor="black" style="background-color: #25eb64; color: black;">Lime</option>
                                                <option value="#1ebe6e" data-textcolor="black" style="background-color: #1ebe6e; color: black;">Emerald</option>
                                                <option value="#137858" data-textcolor="white" style="background-color: #137858; color: white;">Forest</option>
                                                <option value="#e8eb35" data-textcolor="black" style="background-color: #e8eb35; color: black;">Lemon</option>
                                                <option value="#d1be17" data-textcolor="white" style="background-color: #d1be17; color: white;">Mustard</option>
                                                <option value="#787813" data-textcolor="white" style="background-color: #787813; color: white;">Olive</option>
                                                <option value="#eb6725" data-textcolor="black" style="background-color: #eb6725; color: black;">Carrot</option>
                                                <option value="#be511e" data-textcolor="white" style="background-color: #be511e; color: white;">Pumpkin</option>
                                                <option value="#57391e" data-textcolor="white" style="background-color: #57391e; color: white;">Chocolate</option>
                                                <option value="#ffffff" data-textcolor="black" style="background-color: #ffffff; color: black;">White</option>
                                                <option value="#ebebeb" data-textcolor="black" style="background-color: #ebebeb; color: black;">Plaster</option>
                                                <option value="#bebebe" data-textcolor="black" style="background-color: #bebebe; color: black;">Concrete</option>
                                                <option value="#787878" data-textcolor="white" style="background-color: #787878; color: white;">Asphalt</option>
                                                <option value="#000000" data-textcolor="white" style="background-color: #000000; color: white;">Black</option>
                                                <option value="CUSTOM" style="background-color: white">CUSTOM</option>
                                            </select>
                                        </div>

                                        <div class="rte editor button-group" id="inlineStyleGroup">
                                            <a class="rte button editor" id="bold" title="Bold" onclick="boldSel()"><i class="fa fa-fw fa-bold"></i></a>
                                            <a class="rte button editor" id="italic" title="Italicize" onclick="italicSel()"><i class="fa fa-fw fa-italic"></i></a>
                                            <a class="rte button editor" id="underline" title="Underline" onclick="underlineSel()"><i class="fa fa-fw fa-underline"></i></a>
                                            <a class="rte button editor" id="strikethrough" title="Strikethrough" onclick="strikethroughSel()"><i class="fa fa-fw fa-strikethrough"></i></a>
                                        </div>
                                        <div class="button-group" id="alignmentGroup">
                                            <a class="rte button editor" id="left" title="Left-align" onclick="alignLeftSel()"><i class="fa fa-fw fa-align-left"></i></a>
                                            <a class="rte button editor" id="center" title="Center-align" onclick="alignCenterSel()"><i class="fa fa-fw fa-align-center"></i></a>
                                            <a class="rte button editor" id="right" title="Right-align" onclick="alignRightSel()"><i class="fa fa-fw fa-align-right"></i></a>
                                            <a class="rte button editor" id="justify" title="Justify" onclick="alignJustifySel()"><i class="fa fa-fw fa-align-justify"></i></a>
                                        </div>

                                        <div class="button-group" id="listsGroup">
                                            <a class="rte button editor" id="unordered" title="Bulleted List" onclick="newUlSel()"><i class="fa fa-fw fa-list-ul"></i></a>
                                            <a class="rte button editor" id="ordered" title="Numbered List" onclick="newOlSel()"><i class="fa fa-fw fa-list-ol"></i></a>
                                        </div>

                                        <div class="button-group" id="linkGroup">
                                            <a class="rte button editor" id="link" title="Add Hyperlink" onclick="linkSel()"><i class="fa fa-fw fa-link"></i></a>
                                            <a class="rte button editor" id="unlink" title="Remove Hyperlink" onclick="unlinkSel()"><i class="fa fa-fw fa-unlink"></i></a>
                                        </div>
                                    </div>
                                    <textarea class="editor-text-box" id="editor-text-box" style="display:none" name="textareaBox" wrap="hard"></textarea>
                                    <iframe class="editor-richText-box" id="editor-richText-box" name="richTextBox"></iframe>
                                </div>
                            </div>
							

                            <div class="table-responsive">
                                <table id="faqs" class="table ">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Discription</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text"class="form-control" placeholder="title" name="title_d[]"></td>
                                            <td><input type="file" placeholder="image" class="form-control" name="image_d[]"></td>
                                            <td class="text-warning mt-10"><textarea class="form-control" name="discription_d[]"></textarea></td>
                                            <td class="mt-10"><a class="btn btn-primary me-1 waves-effect waves-float waves-light"><i class="fa fa-trash"></i> Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
 

                            </div>
                            <div ><a onclick="addfaqs();" class="btn btn-primary me-1 waves-effect waves-float waves-light"><i class="fa fa-plus"></i> ADD </a></div>

                            <div class="col-12 text-center mt-3">
                                <!-- <a class="rte button main" id="submit" title="Submit" onclick="submitContent()">Save</a> -->
                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>

                            </div>




                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Basic Floating Label Form section end -->
@endsection




	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
    var jq = jQuery.noConflict();
    var faqs_row = 0;

    function addfaqs() {
        html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><input type="text" class="form-control" placeholder="title"name="title_d[]"></td>';
        html += '<td><input type="file" placeholder="image" class="form-control" name="image_d[]"></td>';
        html += ' <td class="text-warning mt-10"><textarea class="form-control" name="discription_d[]"></textarea></td>';
        html += '<td class="mt-10"><a class="btn btn-primary me-1 waves-effect waves-float waves-light" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</a></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }


    $(document).ready(function() {
        // Call iFrameReady function
        iFrameReady();

        // Handle Editor Permissions
        setPermissions(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

        // Handle text file import event
        $("#fileImport").change(function() {
            var fr = new FileReader();
            console.log("This = " + this);
            fr.onload = function() {
                loadContent(this.result);
                console.log("This.result = " + this.result);
            };
            fr.readAsText(this.files[0]);
            console.log("This.Files[0] = " + this.files[0]);
        });


        $('.editor-richText-box').ready(function() {
            richTextBox.document.execCommand('fontName', false, 'sans-serif');
        })

        $('#fontFamily').change(function() {
            var fontFamily = this.value;

            $(this).css('font-family', fontFamily);

            richTextBox.document.execCommand('fontName', false, fontFamily);
        });

        $('#parStyle').change(function() {
            richTextBox.document.execCommand('formatBlock', false, this.value);
        });

        $('#fontSize').change(function() {
            richTextBox.document.execCommand('fontSize', false, this.value);
        });

        $('#textColor').change(function() {
            var colorValue = this.value;
            var textColor = $(this).css('color');
            console.log("TextColor: ", textColor);
            if (colorValue == "CUSTOM") {

                colorValue = prompt("Enter the HEX value or RGBA value: ", "");
            }
            // 
            $(this).css('background-color', colorValue);

            // Set selected color
            richTextBox.document.execCommand('foreColor', false, colorValue);
        });

        $('#textHilight').change(function() {
            var color = this.value;
            if (color == "CUSTOM") {
                // Prompt for Custom Color
                color = prompt("Enter the HEX value or RGBA value: ", "");
            }
            richTextBox.document.execCommand('foreColor', false, color);
        });

    });

    /* FUNCTION DEFINITIONS */

    /* FUNCTION: iFrameReady()
    Allows user editing of iFrame contents. */
    function iFrameReady() {
        richTextBox.document.designMode = 'On';
    }

    document.addEventListener('mouseup', function(event) {
        var iframe = document.getElementById('editor-richText-box');
        if (event.target !== iframe.contentWindow.document) {
            submitContent();
        }
    });

    function submitContent() {
        var theForm = document.getElementById("editor-richText-box");
        var iframe = document.getElementById('editor-richText-box');

        var iframeDocument = iframe.contentWindow || iframe.contentDocument;
        var iframeBody = iframeDocument.document.body;
        var iframeBodyContent = iframeBody.innerHTML;
        $('#editor-text-box').html(iframeBodyContent);
        var sdsds = $('#editor-text-box').html(iframeBodyContent);

        // var existingValue = sdsds;
        // var appendedValue = existingValue + "\nAdditional data"; 
        // theForm.elements["editor-text-box"].value = iframeBodyContent;
        theForm.submit();
    }

    var textareaBox = $('#editor-text-box').val();

    /* FUNCTION: importContent()
    Gets html content from database and injects it into the editor iframe */
    function loadContent(content) {
        var theForm = document.getElementById("wc-richTextEditor-form");
        window.frames['richTextBox'].document.body.innerHTML = content;
    }

    /* FUNCTION: setPermissions()
    Gets object editing permissions and sets Constants for editor's use. */
    function setPermissions(HTML, CHANGE_PAR_STYLE, ALLOW_H1, CHANGE_INLINE_STYLE, CHANGE_SIZE, CHANGE_FONT_FAMILY, CHANGE_PAR_ALIGNMENT, CHANGE_TEXT_COLOR, ADD_LINK, ADD_LIST, ADD_IMAGE) {
        // Restrict all HTML features
        if (HTML == 0) {
            CHANGE_PAR_STYLE = 0;
            ALLOW_H1 = 0;
            CHANGE_INLINE_STYLE = 0;
            CHANGE_SIZE = 0;
            CHANGE_FONT_FAMILY = 0;
            CHANGE_PAR_ALIGNMENT = 0;
            CHANGE_TEXT_COLOR = 0;
            ADD_LINK = 0;
            ADD_LIST = 0;
            ADD_IMAGE = 0;
        }

        //Handle Permissions
        if (CHANGE_PAR_STYLE == 0) {
            $('.editor-controls > #parStyleGroup').hide();
        }
        if (ALLOW_H1 == 0) {
            $('option#heading1').hide();
            $('option#heading1').selected = false;
        }
        if (CHANGE_INLINE_STYLE == 0) {
            $('.editor-controls > #inlineStyleGroup').hide();
        }
        if (CHANGE_SIZE == 0) {
            $('.editor-controls > #textSizeGroup').hide();
        }
        if (CHANGE_FONT_FAMILY == 0) {
            $('.editor-controls > #fontFamilyGroup').hide();
        }
        if (CHANGE_PAR_ALIGNMENT == 0) {
            $('.editor-controls > #alignmentGroup').hide();
        }
        if (CHANGE_TEXT_COLOR == 0) {
            $('.editor-controls > #textColorGroup').hide();
        }
        if (ADD_LIST == 0) {
            $('.editor-controls > #listsGroup').hide();
        }
        if (ADD_LINK == 0) {
            $('.editor-controls > #linkGroup').hide();
        }
    }

    /* FUNCTION: importFromFile()
    Gets object editing permissions and sets Constants for editor's use. */


    /* FUNCTION: header1Sel()
    Sets Header 1 peragraph style for the text */
    function header1Sel() {
        richTextBox.document.execCommand('formatBlock', false, 'h1');
    }

    /* FUNCTION: header2Sel()
    Sets Header 2 peragraph style for the text */
    function header2Sel() {
        richTextBox.document.execCommand('formatBlock', false, 'h2');
    }

    /* FUNCTION: header3Sel()
    Sets Header 3 peragraph style for the text */
    function header3Sel() {
        richTextBox.document.execCommand('formatBlock', false, 'h3');
    }

    /* FUNCTION: paragraphSel()
    Sets Paragraphy peragraph style for the text */
    function paragraphSel() {
        richTextBox.document.execCommand('formatBlock', false, 'p');
    }

    /* FUNCTION: fontSel()
    Change font family of selected text. */
    function fontSel() {

    }

    /* FUNCTION: sizeSel()
    Change font size of selected text. */
    function sizeSel() {
        var size = prompt('Font size:', '');
        richTextBox.document.execCommand('FontSize', false, size);
    }

    /* FUNCTION: boldSel()
    Bolds selected text. */
    function boldSel() {
        richTextBox.document.execCommand('bold', false, null);
    }

    /* FUNCTION: underlineSel()
    Underlines selected text. */
    function underlineSel() {
        richTextBox.document.execCommand('underline', false, null);
    }

    /* FUNCTION: italicSel()
    Italicizes selected text. */
    function italicSel() {
        richTextBox.document.execCommand('italic', false, null);
    }

    /* FUNCTION: strikethroughSel()
    Stikes through selected text. */
    function strikethroughSel() {
        richTextBox.document.execCommand('strikeThrough', false, null);
    }

    /* FUNCTION: textColorSel()
    Changes text color of selected text. */
    function textColorSel() {

    }

    /* FUNCTION: highlightColorSel()
    Changes highlight color of selected text. */
    function highlightColorSel() {

    }

    /* FUNCTION: alignLeftSel()
    Left-aligns selected text. */
    function alignLeftSel() {
        richTextBox.document.execCommand('justifyLeft', false, null);
    }

    /* FUNCTION: alignCenterSel()
    Center-aligns selected text. */
    function alignCenterSel() {
        richTextBox.document.execCommand('justifyCenter', false, null);
    }

    /* FUNCTION: alignRightSel()
    Right-aligns selected text. */
    function alignRightSel() {
        richTextBox.document.execCommand('justifyRight', false, null);
    }

    /* FUNCTION: alignJustifySel()
    Justifies selected text. */
    function alignJustifySel() {
        richTextBox.document.execCommand('justifyFull', false, null);
    }

    /* FUNCTION: newOlSel()
    Creates new Ordered List. */
    function newOlSel() {
        richTextBox.document.execCommand("InsertOrderedList", false, "newOL");
    }

    /* FUNCTION: newUlSel()
    Creates new Unordered List. */
    function newUlSel() {
        richTextBox.document.execCommand("InsertUnorderedList", false, "newUL");
    }

    /* FUNCTION: linkSel()
    Creates new hyperlink. */
    function linkSel() {
        var linkURL = prompt("Enter URL:", "http://");
        richTextBox.document.execCommand("CreateLink", false, linkURL);
    }

    /* FUNCTION: unlinkSel()
    Removes hyperlink. */
    function unlinkSel() {
        richTextBox.document.execCommand("Unlink", false, null);
    }

</script>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,600italic,700,700italic,800,800italic,300italic,300);

    @accent: #00a8ff;
    @accent-dark: #005a89;
    @accent-light: #3bbcff;
    @neutral-dark: #1a1a1a;
    @neutral-medium: #5f5f5f;
    @neutral-light: #f2f2f2;
    @darken: rgba(0, 0, 0, 0.25);
    @lighten: rgba(255, 255, 255, 0.25);

    * {
        -webkit-margin-start: 0;
        -webkit-margin-end: 0;
        -webkit-margin-before: 0;
        -webkit-margin-after: 0;
        -webkit-padding-start: 0;
        -webkit-padding-end: 0;
    }

    #fontFamilyGroup {
        height: 30px;
    }

    #fontFamily {
        height: 26px;
    }

    #parStyle {
        height: 26px;
    }

    #parStyleGroup {
        height: 30px;

    }

    #fontSize {
        height: 30px;

    }

    #textColor {
        height: 30px;

    }

    .bold-line {
        border: 0;
        height: 4px;
        /* Adjust the height as needed */
        background: #000;
        /* Adjust the color as needed */
    }

    body {
        padding: 0;
        margin: 0;
    }

    * {
        font-family: 'Open Sans', Arial, sans-serif;
        outline: none;
        outline-offset: 0;
        border: none;
    }

    a {
        color: @accent;

        &:hover {
            color: @accent-dark;
        }
    }

    body {
        background: #2a2a2a;
    }

    * {
        box-sizing: border-box;
    }

    .editor-controls {
        display: block;
        padding-top: 6px;
        padding-left: 183px;
        padding-right: 8px;
        background-color: #bbbbbb;
        box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.35);
    }

    .editor-controls .button-group {
        display: inline-block;
        margin: 0 2px;
    }


    .editor-richText-box {
        width: 100%;
        min-height: 380px;
        border: 2px solid #cccccc;
        background-color: #efefef;
        font-family: 'Open Sans', helvetica, arial, sans-serif;
        word-break: break-word;
        word-wrap: normal;
        padding: 16px;

    }

    .editor-text-box {
        font-family: 'Open Sans', helvetica, arial, sans-serif;
        word-break: break-word;
        word-wrap: normal;
    }

    .rte.button {
        display: block;
        float: left;
        padding: 6px;
        margin: 6px;
        text-align: center;

        &:hover {
            cursor: pointer;
        }
    }

    .rte.main.button {
        color: white;
        padding: 6px 12px;
        margin: 6px;
        background-color: #2676d5;
        border: 1px solid #1d5aa3;
        font-weight: bold;
        border-radius: 5px;

        &:hover {
            background-color: #3a3a3a;
            border-color: #1a1a1a;
        }

        &.fileUpload {
            position: relative;
            overflow: hidden;
            cursor: pointer;

            input[type='file'] {
                cursor: pointer;
                position: absolute;
                top: 0;
                opacity: 0;
                display: block;
                margin: 0;
                padding: 0;
                font-size: 20px;
                right: 0;
            }
        }
    }

    .rte.editor.button {
        color: #1a1a1a;
        background-color: #eeeeee;
        font-weight: bold;
        margin: 0;
        height: 34px;

        &:hover {
            background-color: #3a3a3a;
            border-color: #1a1a1a;
            color: white;
        }

        &:first-of-type {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        &:last-of-type {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

    }

    .rte.editor.dropdown {
        display: block;
        float: left;
        padding: 5px;
        margin: 6px;
        height: 34px;
        text-align: center;
        color: #1a1a1a;
        background-color: #eeeeee;
        font-weight: bold;
        border-radius: 5px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        display: inline-block;
        margin: 0 0px;
        margin-left: 0;

        &:hover {
            cursor: pointer;
            //background-color: #3a3a3a;
            border-color: #1a1a1a;
            //color: white;
        }

        option {
            background-color: inherit;
            font-weight: bold;
        }
    }

    .rte.editor.dropdown-label {
        color: #1a1a1a;
        background-color: #eeeeee;
        font-weight: bold;
        margin: 0;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        display: block;
        float: left;
        padding: 6px;
        margin: 0;
        text-align: center;
    }

    .rte.editor.dropdown#fontFamily {
        width: 150px;
        font-weight: normal;
    }

</style>
