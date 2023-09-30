
var zoomMeeting = {
    // Meeting config object
    meetConfig: {
        apiKey: 'khs5OCFLQWS_Z7-IakuvuA',
        apiSecret: 'ybXBWtdm25XXnjMv3yJRWK0YFI2NFsYqYe2V',
        meetingNumber: '',
        userName: '',
        passWord: "",
        email: "",
        leaveUrl: "https://zoom.us",
        role: 1
    },

    // Generate Signature function
    signature: function () {
        return ZoomMtg.generateSignature({
            meetingNumber: zoomMeeting.meetConfig.meetingNumber,
            apiKey: zoomMeeting.meetConfig.apiKey,
            apiSecret: zoomMeeting.meetConfig.apiSecret,
            role: zoomMeeting.meetConfig.role,
            success: function (res) {
                // eslint-disable-next-line
                console.log("success signature: " + res.result);
            }
        });
    },

    // join function
    join: function () {
        ZoomMtg.init({
            leaveUrl: "http://www.zoom.us",
            isSupportAV: true,
            success: () => {
                ZoomMtg.join({
                    meetingNumber: this.meetConfig.meetingNumber,
                    userName: this.meetConfig.userName,
                    signature: this.signature(),
                    apiKey: this.meetConfig.apiKey,
                    userEmail: this.meetConfig.email,
                    passWord: this.meetConfig.passWord,
                    success: function (res) {
                        // eslint-disable-next-line
                        console.log("join meeting success");
                    },
                    error: function (res) {
                        // eslint-disable-next-line
                        console.log(res);
                    }
                });
            },
            error: function (res) {
                // eslint-disable-next-line
                console.log(res);
            }
        });
    }
};
