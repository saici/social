<?php

include "includes/connect.php";
include "header.php";
if(isset($_GET['topic'])){
	$thread = mysqli_real_escape_string($con, $_GET['topic']);
}
else{
	$thread = "NONE";
}
?>
<div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
<div class="page-header">
									<h1><?php if($thread == "NONE"){echo 'Nieuw topic';} else{ echo 'Nieuwe reactie';}?></h1>
								</div>
							<div class="well">
											<form action="newtopicsend.php" method="POST">
												<div class="form-group">
													<?php
														if($thread == "NONE"){
															echo'
																<input type="text" class="form-control" name="titelname" placeholder="Titel"><br />
																<select name="catergory" class="form-control">
																	<option value="School">School</option>
																	<option value="Niet-school">Niet school</option>

																</select>
																<input type="hidden" name="topicid" value="' . $thread . '" >
																';
														}
														else{
															echo'
																
																<input type="hidden" name="topicid" value="' . $thread . '" >
																';
														}
													?>
												</div>
					
									<div class="form-group">
										<textarea class="form-control" name="message" id="post" rows="10" placeholder="message"></textarea>
										<script>
											
											CKEDITOR.replace( 'message', {
												/*
												 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
												 */
												extraPlugins: 'htmlwriter',
												language: 'en',
												/*
												 * Style sheet for the contents
												 */
												contentsCss: 'body {color:#000; background-color#:FFF;}',
												
												/*
												 * Simple HTML5 doctype
												 */
												docType: '<!DOCTYPE HTML>',
												
												/*
												 * Allowed content rules which beside limiting allowed HTML
												 * will also take care of transforming styles to attributes
												 * (currently only for img - see transformation rules defined below).
													*
												 * Read more: http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter
												 */
												allowedContent:
												'h1 h2 h3 p pre[align]; ' +
												'blockquote code kbd samp var del ins cite q b i u strike ul ol li hr table tbody tr td th caption; ' +
												'img[!src,alt,align,width,height]; font[!face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
												
												/*
												 * Core styles.
												 */
												coreStyles_bold: { element: 'b' },
												coreStyles_italic: { element: 'i' },
												coreStyles_underline: { element: 'u' },
												coreStyles_strike: { element: 'strike' },
												
												/*
												 * Font face.
												 */
												
												// Define the way font elements will be applied to the document.
												// The "font" element will be used.
												font_style: {
													element: 'font',
													attributes: { 'face': '#(family)' }
												},
												
												/*
												 * Font sizes.
												 */
												fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
												fontSize_style: {
													element: 'font',
													attributes: { 'size': '#(size)' }
												},
												
												/*
												 * Font colors.
												 */
												
												colorButton_foreStyle: {
													element: 'font',
													attributes: { 'color': '#(color)' }
												},
												
												colorButton_backStyle: {
													element: 'font',
													styles: { 'background-color': '#(color)' }
												},
												
												/*
												 * Styles combo.
												 */
												stylesSet: [
												{ name: 'Computer Code', element: 'code' },
												{ name: 'Keyboard Phrase', element: 'kbd' },
												{ name: 'Sample Text', element: 'samp' },
												{ name: 'Variable', element: 'var' },
												{ name: 'Deleted Text', element: 'del' },
												{ name: 'Inserted Text', element: 'ins' },
												{ name: 'Cited Work', element: 'cite' },
												{ name: 'Inline Quotation', element: 'q' }
												],
												
												on: {
													pluginsLoaded: configureTransformations,
													loaded: configureHtmlWriter
												}
											});
											
											/*
											 * Add missing content transformations.
											 */
											function configureTransformations( evt ) {
												var editor = evt.editor;
												
												editor.dataProcessor.htmlFilter.addRules( {
													attributes: {
														style: function( value, element ) {
															// Return #RGB for background and border colors
															return CKEDITOR.tools.convertRgbToHex( value );
														}
													}
												} );
												
												// Default automatic content transformations do not yet take care of
												// align attributes on blocks, so we need to add our own transformation rules.
												function alignToAttribute( element ) {
													if ( element.styles[ 'text-align' ] ) {
														element.attributes.align = element.styles[ 'text-align' ];
														delete element.styles[ 'text-align' ];
													}
												}
												editor.filter.addTransformations( [
												[ { element: 'p',	right: alignToAttribute } ],
												[ { element: 'h1',	right: alignToAttribute } ],
												[ { element: 'h2',	right: alignToAttribute } ],
												[ { element: 'h3',	right: alignToAttribute } ],
												[ { element: 'pre',	right: alignToAttribute } ]
												] );
											}
											
											/*
											 * Adjust the behavior of htmlWriter to make it output HTML like FCKeditor.
											 */
											function configureHtmlWriter( evt ) {
												var editor = evt.editor,
												dataProcessor = editor.dataProcessor;
												
												// Out self closing tags the HTML4 way, like <br>.
												dataProcessor.writer.selfClosingEnd = '>';
												
												// Make output formatting behave similar to FCKeditor.
												var dtd = CKEDITOR.dtd;
												for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
													dataProcessor.writer.setRules( e, {
														indent: true,
														breakBeforeOpen: true,
														breakAfterOpen: false,
														breakBeforeClose: !dtd[ e ][ '#' ],
														breakAfterClose: true
													});
												}
											}
											
										</script>
									</div>
									<input type="submit" class="btn btn-primary" value="Verzenden">
														<!-- Button trigger modal -->
														

												</form>
							
				</div>
		</div>
</div>
<?php include 'footer.php';?>
