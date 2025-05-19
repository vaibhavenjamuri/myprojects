import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns

# Creating a DataFrame based on the table in the Word document
data = {
    "Hotspot": [
        "Okha", "North Mumbai", "South Mumbai", "North Panaji", "South Panaji",
        "Karwar", "Kollam", "Trivandrum", "Rameshwaram",
        "North Chennai", "South Chennai", "Vizag", "Brahmapur", "Puri", "Sri Vijaya Puram (Andaman)"
    ],
    "Dec-Feb": [5, 1, 1, 2, 2, 0, 4, 5, 2, 1, 15, 3, 5, 1, 4],
    "Mar-May": [4, 8, 4, 8, 9, 4, 1, 2, 6, 1, 8, 5, 2, 6, 2],
    "June-Sep": [2, 18, 4, 7, 6, 4, 2, 7, 3, 5, 8, 2, 0, 0, 0],
    "Oct-Nov": [3, 2, 1, 2, 6, 1, 3, 9, 0, 1, 4, 3, 1, 0, 1]
}


df = pd.DataFrame(data)
df.set_index("Hotspot", inplace=True)

# Create a heatmap
plt.figure(figsize=(8, 8))
heatmap = sns.heatmap(df, annot=True, cmap="YlOrRd", linewidths=0.5, linecolor='gray')
colorbar = heatmap.collections[0].colorbar
colorbar.set_label("Number of occurrences", weight='bold')
plt.title("Jellyfish Occurrence Heatmap by Hotspot", fontsize=16)
plt.ylabel("Hotspot",weight='bold')
plt.xlabel("Period",weight='bold')
# plt.xticks(rotation=45)
plt.tight_layout()
plt.show()
