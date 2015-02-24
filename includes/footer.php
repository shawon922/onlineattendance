    </div> <!--Container div end-->
            
</div> <!--Full div end-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery-1.11.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
        
        <script>
            function getXMLHTTP() { //fuction to return the xml http object
            		var xmlhttp=false;	
            		try{
            			xmlhttp=new XMLHttpRequest();
            		}
            		catch(e)	{		
            			try{			
            				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            			}
            			catch(e){
            				try{
            				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            				}
            				catch(e1){
            					xmlhttp=false;
            				}
            			}
            		}
            		 	
            		return xmlhttp;
            	}
            	
            	
            	
            	function getCity(strURL) {		
            		
            		var req = getXMLHTTP();
            		
            		if (req) {
            			
            			req.onreadystatechange = function() {
            				if (req.readyState == 4) {
            					// only if "OK"
            					if (req.status == 200) {						
            						document.getElementById('citydiv').innerHTML=req.responseText;						
            					} else {
            						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
            					}
            				}				
            			}			
            			req.open("GET", strURL, true);
            			req.send(null);
            		}
            				
            	}
                
                
                
                function getArea(strURL) {		
            		
            		var req = getXMLHTTP();
            		
            		if (req) {
            			
            			req.onreadystatechange = function() {
            				if (req.readyState == 4) {
            					// only if "OK"
            					if (req.status == 200) {						
            						document.getElementById('areadiv').innerHTML=req.responseText;						
            					} else {
            						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
            					}
            				}				
            			}			
            			req.open("GET", strURL, true);
            			req.send(null);
            		}
            				
            	}
        </script>
        
        
          

    </body>
</html>