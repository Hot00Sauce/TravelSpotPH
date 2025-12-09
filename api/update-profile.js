const { MongoClient, ObjectId } = require('mongodb');

const uri = process.env.MONGODB_URI;
const client = new MongoClient(uri);

module.exports = async (req, res) => {
    // Set CORS headers
    res.setHeader('Access-Control-Allow-Credentials', true);
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET,OPTIONS,PATCH,DELETE,POST,PUT');
    res.setHeader(
        'Access-Control-Allow-Headers',
        'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version'
    );

    if (req.method === 'OPTIONS') {
        res.status(200).end();
        return;
    }

    if (req.method !== 'POST') {
        return res.status(405).json({ error: 'Method not allowed' });
    }

    try {
        const { userId, username, email, password } = req.body;

        if (!userId || !username || !email) {
            return res.status(400).json({
                success: false,
                error: 'User ID, username, and email are required'
            });
        }

        await client.connect();
        const database = client.db('travelspotph');
        const users = database.collection('users');

        // Check if email is already taken by another user
        const existingUser = await users.findOne({
            email: email,
            _id: { $ne: new ObjectId(userId) }
        });

        if (existingUser) {
            return res.status(400).json({
                success: false,
                error: 'Email already in use by another account'
            });
        }

        // Build update object
        const updateData = {
            username: username,
            email: email
        };

        // Only update password if provided
        if (password && password.trim() !== '') {
            updateData.password = password;
        }

        // Update user
        const result = await users.updateOne(
            { _id: new ObjectId(userId) },
            { $set: updateData }
        );

        if (result.matchedCount === 0) {
            return res.status(404).json({
                success: false,
                error: 'User not found'
            });
        }

        res.status(200).json({
            success: true,
            message: 'Profile updated successfully'
        });

    } catch (error) {
        console.error('Update profile error:', error);
        res.status(500).json({
            success: false,
            error: 'Failed to update profile'
        });
    } finally {
        await client.close();
    }
};
