
<script type="text/javascript">

    function print(txt) {
    // var txtDisplay = document.getElementById("txtDisplay");
    //  txtDisplay.value += txt + "\n";
    // txtDisplay.scrollTop = txtDisplay.scrollHeight; // scroll to end
    }
    
    function dec2hex(i) {
    return( "0x" + ((i<16)?"0":"") + i.toString(16).toUpperCase()); // add leading zero if < 16 e.g. 0x0F
    }
    /*
    function readSingleFile() {
    var preview = document.getElementById('idImg');
    var file    = document.getElementById('file-input').files[0]; 
    var reader  = new FileReader();
    reader.addEventListener("load", function () {
                                        preview.src = reader.result;
                                        }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
    }
    */
    function delay(ms) {
        var deferred = Q.defer();
        setTimeout(deferred.resolve, ms);
        return deferred.promise;
    }
    
    function disconnect() {
    return false;
    }
    
    var usbDevices;
    var tablet;
    

    function ClearSTU() {
    print("ClearSTU");
    connect()
    .then( function(is_connected) {
        console.log(is_connected);
        if( is_connected )
        print("connected");
        else
        print("not connected");
    })
    .then(function(message) {
        return tablet.setClearScreen();
    })
    .then( function(message) {
        return disconnect();
    })
    .fail( function(message) {
        return disconnect();
    })
    }
    
    function connect() {
    var deferred = Q.defer();
    var intf;
    WacomGSS.STU.getUsbDevices()
    .then( function(message) {
        usbDevices = message;
        intf = new WacomGSS.STU.UsbInterface();
        return intf.Constructor();
    })
    .then( function(message) {
        console.log("received: " + JSON.stringify(message));
        return intf.connect(usbDevices[0], true);
    })
    .then( function(message) {
        console.log("received: " + JSON.stringify(message));
        if(0 != message.value) {
        throw new Error("can't connect");
        }
        tablet = new WacomGSS.STU.Tablet();
        return tablet.Constructor(intf);
    })
    .then( function(message) {
        console.log("received: " + JSON.stringify(message));
        intf = null;
        deferred.resolve(true);
    })
    .fail( function (error) {
        deferred.resolve(false);
    });
    return deferred.promise;
    }
    
    function disconnect() {
    var deferred = Q.defer();
    if(!(undefined === tablet || null === tablet)) {
        tablet.disconnect()
        .then( function(message) {
        print("disconnected");
        tablet = null;
        deferred.resolve();
        });
    }
    else {
        deferred.resolve();
    }
    return deferred.promise;
    }
    
    var retry = 0;
    function checkArbitratorConnection() {
    // Establishing a connection to SigCaptX Web Service can take a few seconds, 
    // particularly if the browser itself is still loading/initialising 
    // or on a slower machine. 
    retry = retry + 1;
    if(WacomGSS.STU.isServiceReady()) {
        retry = 0;
        print("SigCaptX Web Service: ready");
        WacomGSS.STU.isDCAReady()
        .then( function(message) {
        print(message? "SigCaptX DCA: ready" : "SigCaptX DCA: not detected");
        });
    } else {
        print("SigCaptX Web Service: not connected");
        if(retry < 20) {
        setTimeout(checkArbitratorConnection, 1000);
        }
    }
    }
    
    setTimeout(checkArbitratorConnection, 1500);
    
    window.addEventListener("beforeunload", function (e) {
    var confirmationMessage = "";
    disconnect()
    .then( function(message) {
        WacomGSS.STU.close();
    }).done();
    /*(e || window.event).returnValue = confirmationMessage; // Gecko + IE
    return confirmationMessage;     */                       // Webkit, Safari, Chrome
    });

        window.onload = function(){
      setTimeout(function(){
                
                var caps;
            var info;
            var pId;
            var encodingFlag;
            var encodingMode;
            var dataStoreImage;
            var p = new WacomGSS.STU.Protocol();
            print("SendToSTU");
            connect()
            .then( function(is_connected) {
                console.log(is_connected);
                if( is_connected )
                print("connected");
                else
                print("not connected");
            })
            .then(function(message) {
                return tablet.getCapability();
            })
            .then(function(message) {
                caps = message;
                return tablet.getInformation();
            })
            .then(function(message) {
                info = message;
                print("STU model: " + info.modelName);
                return tablet.getUid();
            })
            .then(function(message) {
                print("UID: " + message);
                return tablet.getUid2();
            })
            .then(function(message) {
                print("UID2: " + message);
                return tablet.getProductId();
            })
            .then(function(message) {
                pId = message;
                print("Product id: "+ dec2hex(pId));
                return WacomGSS.STU.ProtocolHelper.simulateEncodingFlag(pId, caps.encodingFlag);
            })
            .then( function(message) {
                encodingFlag = message;
                print("encodingFlag: " + dec2hex(encodingFlag));
                if ((encodingFlag & p.EncodingFlag.EncodingFlag_24bit) != 0) {
                return tablet.supportsWrite()
                        .then(  function(message) {
                            encodingMode = message ? p.EncodingMode.EncodingMode_24bit_Bulk : p.EncodingMode.EncodingMode_24bit;
                        });
                } else if ((encodingFlag & p.EncodingFlag.EncodingFlag_16bit) != 0) {
                return tablet.supportsWrite()
                        .then(  function(message) {
                            encodingMode = message ? p.EncodingMode.EncodingMode_16bit_Bulk : p.EncodingMode.EncodingMode_16bit;
                        }); 
                }  else { // assumes 1bit is available
                encodingMode = p.EncodingMode.EncodingMode_1bit; 
                }
            })
            .then( function(message) {
                print("encodingMode: " + encodingMode);
                var myCanvas = document.createElement("canvas");
                myCanvas.height = caps.screenHeight;
                myCanvas.width = caps.screenWidth;
                var ctx = myCanvas.getContext("2d");
                var img = document.getElementById("idImg");
                ctx.drawImage(img, 0, 0);
                var canvasImage = myCanvas.toDataURL("image/jpeg");
                return WacomGSS.STU.ProtocolHelper.resizeAndFlatten
                (canvasImage,0,0,0, 0, caps.screenWidth, caps.screenHeight,encodingMode,1, false, 0, true);
            })
            .then( function(message) {
                dataStoreImage = message;
                return tablet.writeImage(encodingMode, dataStoreImage);
            })
           // .then( function(message) {
           //     return disconnect();
           // })
           // .fail( function(message) {
           //     return disconnect();
           // })

       }, 400);
        
            
   };
    
    
</script>
<img id="idImg" style="width:250pt;display:none;" src="images/signlogo.png"/>
