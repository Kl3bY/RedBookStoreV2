package br.com.etecia.redbookstore;

public class Book {
      private int cod;
      private String nome;
      private String genero;
      private String desclivro;
      private int rate;
      private Float preco;


    public Book(int cod, String nome, String genero, String desclivro, int rate, Float preco) {
        this.cod = cod;
        this.nome = nome;
        this.genero = genero;
        this.desclivro = desclivro;
        this.rate = rate;
        this.preco = preco;
    }

    public int getCod() {
        return cod;
    }

    public void setCod(int cod) {
        this.cod = cod;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getGenero() {
        return genero;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public String getDesclivro() {
        return desclivro;
    }

    public void setDesclivro(String desclivro) {
        this.desclivro = desclivro;
    }

    public int getRate() {
        return rate;
    }

    public void setRate(int rate) {
        this.rate = rate;
    }

    public Float getPreco() {
        return preco;
    }

    public void setPreco(Float preco) {
        this.preco = preco;
    }
}
