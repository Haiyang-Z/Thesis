const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const fs = require('fs');
const path = require('path');
const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());
app.use(bodyParser.json());

const markersFilePath = path.join(__dirname, 'user_markers.json');

function readMarkers() {
    if (fs.existsSync(markersFilePath)) {
        const data = fs.readFileSync(markersFilePath);
        return JSON.parse(data);
    }
    return [];
}

function saveMarkers(markers) {
    fs.writeFileSync(markersFilePath, JSON.stringify(markers, null, 2));
}

app.post('/save-marker', (req, res) => {
    const { latitude, longitude, visitDate, peopleCount, transport, name, age, gender, wechat, phone } = req.body;
    const markers = readMarkers();
    markers.push({ latitude, longitude, visitDate, peopleCount, transport, name, age, gender, wechat, phone });
    saveMarkers(markers);
    res.json({ success: true });
});

app.get('/get-markers', (req, res) => {
    const markers = readMarkers();
    res.json(markers);
});

app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
