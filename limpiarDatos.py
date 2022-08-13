import pandas as pd

excel1 = "dataframe/counties.xlsx"
df = pd.read_excel(excel1)

print (df)
for column in df.columns:
    df [column] = df [column].str.replace(r"\W","")
df.to_excel("dataframe/excellimpio.xlsx")