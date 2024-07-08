import joblib
import sys
from nltk.tokenize import RegexpTokenizer
from nltk.corpus import stopwords
from textblob import Word
from sklearn.feature_extraction.text import CountVectorizer, TfidfTransformer

# Load the SVM model, Count Vectorizer, and TF-IDF Transformer
model = joblib.load('training/LSTM.pkl')
count_vect = joblib.load('training/count_vect.pkl')
transformer = joblib.load('training/transformer.pkl')

def preprocess_text(text):
    # Preprocessing steps
    text = text.lower()
    tokenizer = RegexpTokenizer(r'\w+')
    words = tokenizer.tokenize(text)
    stop = set(stopwords.words('english')) - set(["not", "here", "some"])
    words = [Word(word).lemmatize() for word in words if word not in stop]
    return " ".join(words)

def classify_text(text):
    # Preprocess the input text
    cleaned_text = preprocess_text(text)
    
    # Vectorize and transform the cleaned text
    text_counts = count_vect.transform([cleaned_text])
    text_tfidf = transformer.transform(text_counts)
    # Make a prediction using the SVM model
    output=model.predict(text_tfidf)[0]
    if output=="Potential Suicide post":
        return "yes"
    else:
        return "no"

if __name__ == "__main__":
    # Get user input from PHP POST request
    input_text = sys.argv[1]
    
    # Classify the input text and print the result (0 or 1)
    print(classify_text(input_text))