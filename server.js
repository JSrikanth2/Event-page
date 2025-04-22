const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const cors = require('cors');

// Importing User model
const User = require('./models/User');

// Initialize app
const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(express.static('public')); // Serve static files like HTML

// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/cultural-events', {
    useNewUrlParser: true,
    useUnifiedTopology: true
}).then(() => console.log('✅ MongoDB Connected'))
  .catch((err) => console.error('❌ MongoDB connection error:', err));

// Registration endpoint
app.post('/register', async (req, res) => {
    const { username, mobile, email, password, confirmPassword } = req.body;

    if (password !== confirmPassword) {
        return res.status(400).json({ error: "Passwords do not match" });
    }

    try {
        const newUser = new User({ username, mobile, email, password });
        await newUser.save();
        res.status(200).json({ message: "Registration successful" });
    } catch (err) {
        res.status(500).json({ error: "Error saving user" });
    }
});

// Start the server
app.listen(PORT, () => {
    console.log(`🚀 Server running at http://localhost:${PORT}`);
});
