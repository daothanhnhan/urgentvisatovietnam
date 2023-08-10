<?php include DIR_OTHER."MS_OTHER_VISA_0011.php";?>
<script src="https://www.paypal.com/sdk/js?client-id=AQaiYzjhbhQebtlyWt4CmxbT6SfaibmNNmXNQeiKlTFd6HPx1tbVzGTWk7cW98MPrombbZhLmzP8ogMJ&amp;currency=USD" data-sdk-integration-source="button-factory" data-uid-auto="uid_mvhxthxhxeamwlrsaugkgjxdfrjjzs"></script>
<!-- <script src="https://www.paypal.com/tagmanager/pptm.js?id=entryvietnamvisa.com&amp;t=xo&amp;v=5.0.377&amp;source=payments_sdk&amp;client_id=ATA8R291P-buiphkA7UT-lWAlpLPVcxzVMmx5mdd9rqbGfD-uY2W69EM0EVo3U_rDAdyFDEFstqEo7Hm&amp;vault=false" id="xo-pptm" async=""></script> -->
<!-- <script type="text/javascript" async="" src="https://www.paypalobjects.com/muse/muse.js"></script> -->

<div id="paypal-button-container"></div>
<div id="paypal-button-message"></div>

<script>
              function initPayPalButton() {
                paypal.Buttons({
                  style: {
                    shape: 'rect',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'paypal',

                  },

                  createOrder: function(data, actions) {
                    return actions.order.create({                                       
                      purchase_units: [{
                                      amount: {                                      
										value: '1',
										currency_code: 'USD'
                                      },
                        			  description:'VietnamVisaBookingID:VS-3553204'
                                    }],                     
                    });
                  },

                  onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {					  
                      if(orderData.status == 'COMPLETED'){                       
                        actions.redirect('https://entryvietnamvisa.com/paypal-order/')	
                      }else{
                          const element = document.getElementById('paypal-button-message');
                          element.innerHTML = '';
                          element.innerHTML = '<h3>Fail to Payment!</h3>';
                      }
                      				
                    });
                  },
                    
                //onCancel: function (data) {
                          //const element = document.getElementById('paypal-button-message');
                          //element.innerHTML = '';
                          //element.innerHTML = '<h3></h3>';
                 //}
                  
                //onShippingChange: function(data, actions) {					
				//	return actions.reject();				
				//}  
                  
                }).render('#paypal-button-container');
                
                //fix the issue: paypal is not defined
                var waitForSdk = setInterval(function () {
                    if (typeof paypal !== 'undefined') {
                       clearInterval(waitForSdk);
                       paypal.Buttons.render('#paypal-button-container');
                    }
                  }, 100);
              }
              
              //function status(res) {
              //    if (!res.ok) {
              //        throw new Error(res.statusText);
              //    }
              //    return res;
              //}               
              initPayPalButton();
			</script>