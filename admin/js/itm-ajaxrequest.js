t301.ready(function() {
    /* On window load */
    var base64 = {
			encode: function utoa(str) {
				return window.btoa(unescape(encodeURIComponent(str)));
			},
			decode: function atou(str) {
				return decodeURIComponent(escape(window.atob(str)));
			}
		};
    function strCapitalize(str){
        /* Capitalized Per Word */
        return str.replace(/\b(\w)/g, function (match) {
                return match.toUpperCase();
            });
    }
    function JSON2payload(json_data){
        let payload ='';
        for(key in json_data){
            payload+=[key]+'='+json_data[key]+'&';
        };
        return payload.substr(0,payload.length-1);
    }
    function attribTags(img){

        // Variables Initialization
        let img_title = img.title;
        let img_alt = img.alt;
        let img_name = img.src;

        let is_title_set = true;
        let is_alt_set = true;
        let is_override = false;

        // Check if image already has an alt or title attribute
        if(img_title=== 'null' || img_title === 'undefined' || img_title===''){
            is_title_set = false;
        }
        if(img_alt === 'null' || img_alt === 'undefined' || img_alt===''){
            is_alt_set = false;
        }
        if(parseInt(itm_ajaxrequest.options['override_title'])==1){
            is_override =true;
        }

        // Skip if image has already alt, title and override settings is false
        if(is_title_set && is_alt_set && !is_override){
            return;
        }

        // get the image source

                   //this removes the anchor at the end, if there is one
        img_name = img_name.substring(0, (img_name.indexOf("#" == -1) ? img_name.length : img_name.indexOf("#")));
                   //this removes the query after the file name, if there is one
        img_name = img_name.substring(0, (img_name.indexOf("?") == -1) ? img_name.length : img_name.indexOf("?"));
                   //this removes everything before the last slash in the path
        img_name = img_name.substring(img_name.lastIndexOf('/')+1);  //img.src.replace(/^.*[\\\/]/, '');
                   //this removes extension
        img_name = (img_name.indexOf('.')!=-1) ? img_name.split('.').slice(0, -1).join('.') : img_name;

        // Create an ajax request for the plugin settings, and image tag attribute values

        const xhttp = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
        let json_data = {
                            "filename":img_name,
                            "filesrc":img.src,
                            "post_title":itm_ajaxrequest.options['post_title'],
                            "security":itm_ajaxrequest.security,
                            "action":itm_ajaxrequest.action
                        };
        xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                if(parseInt(itm_ajaxrequest.options['js_log'])==1){
                    console.group('Server Request - Success');
                    console.info("Response: "+JSON.stringify(this.response));
                    console.info("Status: "+this.status);
                    console.info("Status Text: "+this.statusText);
                    console.info("Data Sent: "+JSON.stringify(json_data));
                    console.table("Request Headers: "+xhttp.getAllResponseHeaders());
                    console.groupEnd();
                }
                /* Verify title tag and replace with a valid title */
                if(!is_title_set || is_override){
                    img.title = this.response['title'];
                }
                /* Verify alt tag and replace with a valid alt */
                if(!is_alt_set || is_override){
                    img.alt = this.response['alt'];
                }
            }
            else if(this.readyState == 4 && this.status != 200)
            {
                if(parseInt(itm_ajaxrequest.options['js_log'])==1){
                    console.group('Server Request - Error');
                    console.info("Response: "+JSON.stringify(this.response));
                    console.info("Status: "+this.status);
                    console.info("Status Text: "+this.statusText);
                    console.info("Data Sent: "+JSON.stringify(json_data));
                    console.table("Request Headers: "+xhttp.getAllResponseHeaders());
                    console.groupEnd();
                }

                if(parseInt(itm_ajaxrequest.options['preserved_char'])!=1){
                    if(parseInt(itm_ajaxrequest.options['strip_numbers'])==1){
                        /* Remove numbers and dimentional settings of image eg. filename 250x250*/
                        img_name= img_name.replace(/\s?\d?\s?x?\s?\d?\s?/gmi, '');
                        img_name= img_name.replace(/[0-9]/gmi, '');
                    }
                    /* Remove any non-word chacacter accepts [a-zA-Z0-9]*/
                    img_name= img_name.replace(/[^\w]/gmi, ' ');
                }
                /* Remove multiple underscore & hypens */
                img_name= img_name.replace(/\s*[-_\s]+\s*/gmi, ' ');
                /* Remove multiple spaces & tabs */
                img_name= img_name.replace(/\s\s+/gmi, ' ');
                /* Trim spaces in the start and end of string */
                img_name= img_name.trim();
                if(parseInt(itm_ajaxrequest.options['preserved_char'])!=1){
                    if(img_name.split("").length < 3){
                        if(parseInt(itm_ajaxrequest.options['use_post_title_as_default'])==1){
                            if(itm_ajaxrequest.options['post_title']!==''){
                                img_name = itm_ajaxrequest.options['post_title'];
                            }
                            else{
                                img_name = itm_ajaxrequest.options['blog_name'];
                            }
                            img_name= img_name.trim();
                        }
                    }
                }
                // Get the title separator
                if(parseInt(itm_ajaxrequest.options['bar_separator'])==1) {
                    let s = ' | ';
                }
                else{
                    let s = ' - ';
                }

                let image_alt_name=img_name;
                let image_title_name=img_name;

                // Check if add post/page title is enabled
                if(parseInt(itm_ajaxrequest.options['add_post_title_to_alt'])==1){
                    if(itm_ajaxrequest.options['post_title']!==''){
                        if(image_alt_name.indexOf(itm_ajaxrequest.options['post_title'])==-1){
                            image_alt_name +=s+itm_ajaxrequest.options['post_title'];
                        }
                    }
                }

                if(parseInt(itm_ajaxrequest.options['add_post_title_to_title'])==1){
                    if(itm_ajaxrequest.options['post_title']!==''){
                        if(image_title_name.indexOf(itm_ajaxrequest.options['post_title'])==-1){
                            image_title_name +=s+itm_ajaxrequest.options['post_title'];
                        }
                    }
                }
                // Check if string trimmer is enabled
                if(parseInt(itm_ajaxrequest.options['string_trimmer'])==1){
                    let remove_from_alt = itm_ajaxrequest.options['remove_from_alt'];
                    remove_from_alt = remove_from_alt.split(',');
                    for(let i = 0; i < remove_from_alt.length; i++){
                        image_alt_name= image_alt_name.toLowerCase();
                        image_alt_name = image_alt_name.replace(remove_from_alt[i].trim().toLowerCase(),'');
                    }
                    let remove_from_title = itm_ajaxrequest.options['remove_from_title'];
                    remove_from_title = remove_from_title.split(',');
                    for(let i = 0; i < remove_from_title.length; i++){
                        image_title_name= image_title_name.toLowerCase();
                        image_title_name = image_title_name.replace(remove_from_title[i].trim().toLowerCase(), '');
                    }
                }
                // Get the string case settings
                switch(parseInt(itm_ajaxrequest.options['string_case'])){
                    case 1:
                        image_title_name = image_title_name.toLowerCase();
                        image_alt_name = image_alt_name.toLowerCase();
                    break;
                    case 2:
                        image_title_name = image_title_name.toUpperCase();
                        image_alt_name = image_alt_name.toUpperCase();
                    break;
                    case 3:
                        image_title_name = strCapitalize( image_title_name );
                        image_alt_name = strCapitalize( image_alt_name );
                    break;
                    case 4:
                        image_title_name = image_title_name.charAt(0).toUpperCase() + image_title_name.slice(1).toLowerCase();
                        image_alt_name = image_alt_name.charAt(0).toUpperCase() + image_alt_name.slice(1).toLowerCase();
                    break;
                }

                /* Verify title tag and replace with a valid title */
                if(!is_title_set || is_override){
                    img.title = image_title_name;
                }
                /* Verify alt tag and replace with a valid alt */
                if(!is_alt_set || is_override){
                    img.alt = image_alt_name;
                }
            }
        };

        xhttp.open('POST', itm_ajaxrequest.ajaxurl, true);
        xhttp.responseType = 'json';
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");

        xhttp.send(JSON2payload(json_data));
    }

    const images = t301.queries('img');
    if(images){
        /* Loop images and verify each */
        for(let x = 0; x < images.length; x++) {
            attribTags(images[x]);
        }
    }
});
