ZoomMtg.setZoomJSLib('https://source.zoom.us/2.11.0/lib', '/av')

ZoomMtg.preLoadWasm()
ZoomMtg.prepareWebSDK()
// loads language files, also passes any error messages to the ui
ZoomMtg.i18n.load('en-US')
ZoomMtg.i18n.reload('en-US')


function getSignature() {
    var sg =  generateSignature(sdkKey, sdkSecret, meetingNumber, role);

    startMeeting(sg);
    return;
  /*fetch(authEndpoint, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      meetingNumber: meetingNumber,
      role: role
    })
  }).then((response) => {
    return response.json()
  }).then((data) => {
    console.log(data)
    startMeeting(data.signature)
  }).catch((error) => {
  	console.log(error)
  })*/
}

function startMeeting(signature) {

  document.getElementById('zmmtg-root').style.display = 'block'

  ZoomMtg.init({
    leaveUrl: leaveUrl,
    success: (success) => {
      console.log(success)
      ZoomMtg.join({
        signature: signature,
        sdkKey: sdkKey,
        meetingNumber: meetingNumber,
        passWord: passWord,
        userName: userName,
        userEmail: userEmail,
        tk: registrantToken,
        zak: zakToken,
        success: (success) => {
          console.log(success)
        },
        error: (error) => {
          console.log(error)
        },
      })
    },
    error: (error) => {
      console.log(error)
    }
  })
}
