import pickle
import sys
import numpy as np
from keras.models import load_model
from keras.preprocessing.text import Tokenizer
from keras.preprocessing.sequence import pad_sequences
import joblib
from nltk.tokenize import RegexpTokenizer
from nltk.corpus import stopwords
from textblob import Word
from sklearn.feature_extraction.text import CountVectorizer, TfidfTransformer

# Load the pre-trained model
model = load_model('training/lastm-2-layer-best_model.h5')

# Load the tokenizer object
with open('training/tokenizer.pickle', 'rb') as handle:
    tokenizer = pickle.load(handle)

# Define the maximum text length (should be the same as used during training)
max_text_len = 60

def preprocess_text(text):
    # Preprocessing steps
    text = text.lower()
    tokenizer = RegexpTokenizer(r'\w+')
    words = tokenizer.tokenize(text)
    stop = set(stopwords.words('english')) - set(["not", "here", "some"])
    words = [Word(word).lemmatize() for word in words if word not in stop]
    return " ".join(words)
# Function to predict the label for a given text
def classify_text(text):
    cleaned_text = preprocess_text(text)
    twt = [cleaned_text]
    twt = tokenizer.texts_to_sequences(twt)
    twt = pad_sequences(twt, maxlen=max_text_len, dtype='int32')

    # Make predictions
    predicted = model.predict(twt, batch_size=1, verbose=True)

    if np.argmax(predicted) == 0:
        return "Potential Suicide Post"
    else:
        return "Non Suicide Post"

if __name__ == "__main__":
    # Get user input from PHP POST request
    input_text = sys.argv[1]
    
    # Classify the input text and print the result (0 or 1)
    print(classify_text(input_text))