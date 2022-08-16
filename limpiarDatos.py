#importamos Pandas
import pandas as pd

#cargamos hoja excel en una variable
data = "counties.xlsx"

#leemos el excel
df = pd.read_excel(data)

#quitamos caracteres especiales 
df['county'] = df['county'].str.replace(r"\W","", regex=True)

#asignamos el indice
df_Clean=df.set_index('codestate')

#guardamos los datos limpios en nuevo archivo excel
df_Clean.to_excel("DataClean.xlsx")

#creamos un archivo csv para insertar datos en la BD
df_Clean.to_csv('counties.csv', encoding='utf-8', index=False)
 

print("Dataset Clean")
