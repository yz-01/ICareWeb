import os
from pushbullet import PushBullet

API_KEY = "o.qpZPyrvMghotQOUjYHYtTOvoiQWLiE2Q"
folderPath = "PatientCallingHistory"
fileName = "Tey Yoong Zhun.txt"
file = os.path.join(folderPath, fileName)

# Read the existing content from the file
with open(file, mode='r') as f:
    text = f.read()

# Append new content to the existing content
new_content = "New content to add."
text += new_content

# Write the updated content back to the file
with open(file, mode='w') as f:
    f.write(text)

# Push the updated content using PushBullet
pb = PushBullet(API_KEY)
push = pb.push_note('Patient Calling', text)
